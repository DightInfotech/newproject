<?php

namespace App\Console\Commands;

use App\Mail\MemoFileGenerate;
use App\Models\Demographic;
use App\Models\DemographicPage;
use App\Models\IncomeExpense;
use App\Models\Job;
use App\Models\MarketTimelinePage;
use App\Models\MemoFile;
use App\Models\Memorandum;
use App\Models\MixUnit;
use App\Models\PricingFinancial;
use App\Models\ProjectionIncrement;
use App\Models\PropertyDescription;
use App\Models\RecentSale;
use App\Models\RecentSaleField;
use App\Models\RecentSaleGraph;
use App\Models\RentComparable;
use App\Models\RentComparableField;
use App\Models\RentComparableGraph;
use App\Models\YearProjection;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use PDF;

class PdfGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will execute pdf generation of memorandum';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pending_jobs = Job::where('is_done',0)->get();
        if(!empty($pending_jobs)){
            foreach ($pending_jobs as $job){
                $memorandum = Memorandum::find($job->memorandum_id);
                $memo_pages = $memorandum->memo_pages;
                if(!empty($memo_pages)) {
                    $pages = [];$gallery = [];$gallery_title='';$recent_sales=[];$rent_comparables=[];$market_comparables=[];$demographic_images=[];
                    $timeline_page=[];$recent_sale_graphs=[];$graph_page_title='';$rent_comp_graphs=[];
                    $y_2 = [];$y_3 = [];$y_4 = [];$y_5 = [];$y_6 = [];$y_7 = [];$y_8 = [];$y_9 = [];$y_10 = [];
                    $i = 0;$j=0;$k=0;
                    $pf = PricingFinancial::where('memorandum_id', $job->memorandum_id)->first();
                    $mix_units = MixUnit::where('memorandum_id', $job->memorandum_id)->get();
                    $in_exp = IncomeExpense::where('memorandum_id', $job->memorandum_id)->first();
                    $yp = YearProjection::where('memorandum_id', $job->memorandum_id)->first();
                    $proj_increments = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->get();

                    if(!empty($proj_increments)){
                        $y_2 = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->where('year',2)->first();
                        $y_3 = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->where('year',3)->first();
                        $y_4 = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->where('year',4)->first();
                        $y_5 = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->where('year',5)->first();
                        $y_6 = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->where('year',6)->first();
                        $y_7 = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->where('year',7)->first();
                        $y_8 = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->where('year',8)->first();
                        $y_9 = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->where('year',9)->first();
                        $y_10 = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->where('year',10)->first();
                    }

                    $pd = PropertyDescription::where('memorandum_id', $job->memorandum_id)->first();
                    $rsf = RecentSaleField::where('memorandum_id', $job->memorandum_id)->first();
                    $rcf = RentComparableField::where('memorandum_id', $job->memorandum_id)->first();
                    $demographic = Demographic::where('memorandum_id', $job->memorandum_id)->first();
                    foreach ($memo_pages as $memo) {
                        if ($memo->template == 'page-4') {
                            $pricing_section_number = $memo->page_number;
                        } elseif ($memo->template == 'page-12') {
                            $desc_section_number = $memo->page_number;
                        } elseif ($memo->template == 'recent-sales-cover') {
                            $recent_section_number = $memo->page_number;
                        } elseif ($memo->template == 'rent-comparable-cover') {
                            $rent_section_number = $memo->page_number;
                        } elseif ($memo->template == 'demographic-cover') {
                            $demographic_section_number = $memo->page_number;
                        }
                    }
                    foreach ($memo_pages as $memo) {
                        if($memo->template == 'six-images' || $memo->template == 'two-landscape' || $memo->template == 'two-portrait'){
                            $gallery_title = $memo->title;
                            $gallery = json_decode($memo->gallery_ids);
                        }elseif($memo->template == 'recent-sales'){
                            $sale_ids = json_decode($memo->recent_sale_ids);
                            $recent_sales = RecentSale::whereIn('id',$sale_ids)->get();
                            $j=$j+1;
                        }elseif($memo->template == 'recent-sales-graph') {
                            $graph_ids = [];
                            $graph_page_title = $memo->title;
                            $graph_ids = json_decode($memo->recent_graph_ids);
                            $recent_sale_graphs = RecentSaleGraph::whereIn('id',$graph_ids)->get();
                        }elseif($memo->template == 'rent-comparable-graph') {
                            $graph_ids = [];
                            $graph_page_title = $memo->title;
                            $graph_ids = json_decode($memo->rent_graph_ids);
                            $rent_comp_graphs = RentComparableGraph::whereIn('id',$graph_ids)->get();
                        }elseif($memo->template == 'rent-comparables'){
                            $rent_ids = json_decode($memo->rent_comparable_ids);
                            $rent_comparables = RentComparable::whereIn('id',$rent_ids)->get();
                            $k=$k+1;
                        }elseif($memo->template == 'one-centered-demographic' || $memo->template == 'two-portrait-demographic'){
                            $demographic_images = json_decode($memo->demographic_ids);
                        }
                        $page_number = $memo->page_number;
                        $pages[] = View::make('memorandum-pages.' . $memo->template,
                            compact('memorandum', 'page_number','j','k','pf', 'pd', 'mix_units', 'yp','proj_increments', 'in_exp', 'gallery','gallery_title', 'recent_sales', 'rent_comparables', 'rsf', 'rcf', 'demographic',
                                'pricing_section_number','desc_section_number','recent_section_number','rent_section_number','demographic_section_number','demographic_images','recent_sale_graphs','graph_page_title','rent_comp_graphs',
                                'y_2','y_3','y_4','y_5','y_6','y_7','y_8','y_9','y_10'));
                        $i++;
                    }

                    $pdf = PDF::loadView('memorandum-pages.complete-pdf', ['pages' => $pages, 'memorandum' => $memorandum])->setOrientation('landscape')
                        ->setOption('lowquality', null)
                        ->setOption('dpi', 300)
                        ->setOption('disable-smart-shrinking', false)
                        ->setOption('margin-top', 0)
                        ->setOption('margin-bottom', 0)
                        ->setOption('margin-left', 0)
                        ->setOption('margin-right', 0);
                    $pdf_name = str_replace(' ', '-', $memorandum->property_title) . '.pdf';
                    $job->update(['is_done' => 1]);
                    $memo_file = MemoFile::updateOrCreate([
                        'memorandum_id' => $memorandum->id
                    ],['file_name' => $pdf_name]);
                    @unlink(storage_path('app/public/pdf/'.$pdf_name));
                    return $pdf->save(storage_path('app/public/pdf/'.$pdf_name));
                }//end if memo pages
            }//end foreach loop of jobs
        }//end empty jobs check
    }
}
