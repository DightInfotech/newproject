<?php

namespace App\Console\Commands;

use App\Mail\MemoFileGenerate;
use App\Models\Demographic;
use App\Models\IncomeExpense;
use App\Models\MarketComparable;
use App\Models\MarketComparableField;
use App\Models\MarketComparableGraph;
use App\Models\MarketingExchangeOption;
use App\Models\MarketJob;
use App\Models\MarketPlan;
use App\Models\MarketPricing;
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

class MarketPdfGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf:market-generate';

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
        $pending_jobs = MarketJob::where('is_done',0)->get();
        if(!empty($pending_jobs)){
            foreach ($pending_jobs as $job){
                $memorandum = Memorandum::find($job->memorandum_id);
                $market_pages = $memorandum->market_pages;
                if(!empty($market_pages)) {
                    $pages = [];$gallery = [];$gallery_title='';$recent_sales=[];$rent_comparables=[];$market_comparables=[];$demographic_images=[];
                    $timeline_page=[];$recent_sale_graphs=[];$graph_page_title='';$rent_comp_graphs=[];$market_graphs=[];
                    $i = 0;$j=0;$k=0;$l=0;
                    $pf = PricingFinancial::where('memorandum_id', $job->memorandum_id)->first();
                    $mix_units = MixUnit::where('memorandum_id', $job->memorandum_id)->get();
                    $in_exp = IncomeExpense::where('memorandum_id', $job->memorandum_id)->first();
                    $yp = YearProjection::where('memorandum_id', $job->memorandum_id)->first();
                    $proj_increments = ProjectionIncrement::where('memorandum_id',$job->memorandum_id)->get();
                    $pd = PropertyDescription::where('memorandum_id', $job->memorandum_id)->first();
                    $rsf = RecentSaleField::where('memorandum_id', $job->memorandum_id)->first();
                    $mcf = MarketComparableField::where('memorandum_id', $job->memorandum_id)->first();
                    $rcf = RentComparableField::where('memorandum_id', $job->memorandum_id)->first();
                    $demographic = Demographic::where('memorandum_id', $job->memorandum_id)->first();
                    $mp = MarketPlan::where('memorandum_id', $job->memorandum_id)->first();

                    $p_c_list = MarketPricing::where('memorandum_id',$job->memorandum_id)->where('pricing_type','pricing_current_list')->first();
                    $p_c_range = MarketPricing::where('memorandum_id',$job->memorandum_id)->where('pricing_type','pricing_current_range')->first();
                    $p_p_list = MarketPricing::where('memorandum_id',$job->memorandum_id)->where('pricing_type','pricing_proforma_list')->first();
                    $p_p_range = MarketPricing::where('memorandum_id',$job->memorandum_id)->where('pricing_type','pricing_proforma_range')->first();

                    $sales_range = MarketingExchangeOption::where('memorandum_id',$job->memorandum_id)->first();

                    foreach ($market_pages as $memo) {
                        if ($memo->template == 'page-4') {
                            $pricing_section_number = $memo->page_number;
                        } elseif ($memo->template == 'page-12') {
                            $desc_section_number = $memo->page_number;
                        } elseif ($memo->template == 'recent-sales-cover') {
                            $recent_section_number = $memo->page_number;
                        }elseif ($memo->template == 'market-comparable-cover') {
                            $market_comp_section_number = $memo->page_number;
                        } elseif ($memo->template == 'rent-comparable-cover') {
                            $rent_section_number = $memo->page_number;
                        } elseif ($memo->template == 'demographic-cover') {
                            $demographic_section_number = $memo->page_number;
                        }elseif ($memo->template == 'market-plan-cover') {
                            $market_plan_section_number = $memo->page_number;
                        }
                    }
                    foreach ($market_pages as $memo) {
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
                        }elseif($memo->template == 'market-comparable-graph') {
                            $graph_ids = [];
                            $graph_page_title = $memo->title;
                            $graph_ids = json_decode($memo->market_graph_ids);
                            $market_graphs = MarketComparableGraph::whereIn('id',$graph_ids)->get();
                        }elseif($memo->template == 'market-comparables'){
                            $market_ids = json_decode($memo->market_comparable_ids);
                            $market_comparables = MarketComparable::whereIn('id',$market_ids)->get();
                            $l=$l+1;
                        }elseif($memo->template == 'rent-comparables'){
                            $rent_ids = json_decode($memo->rent_comparable_ids);
                            $rent_comparables = RentComparable::whereIn('id',$rent_ids)->get();
                            $k=$k+1;
                        }elseif($memo->template == 'one-centered-demographic' || $memo->template == 'two-portrait-demographic'){
                            $demographic_images = json_decode($memo->demographic_ids);
                        }elseif($memo->template == 'market-plan-timeline'){
                            $timeline_page = MarketTimelinePage::find($memo->timeline_id);
                        }
                        $page_number = $memo->page_number;
                        $pages[] = View::make('memorandum-pages.' . $memo->template,
                            compact('memorandum', 'page_number','j','k','l','pf', 'pd','mp', 'mix_units', 'yp','proj_increments', 'in_exp', 'gallery','gallery_title', 'recent_sales', 'rent_comparables','market_comparables', 'rsf', 'rcf','mcf', 'demographic',
                                'pricing_section_number','desc_section_number','recent_section_number','market_comp_section_number','rent_section_number','demographic_section_number','market_plan_section_number','demographic_images','timeline_page','p_c_list','p_c_range','p_p_list','p_p_range','sales_range',
                                'recent_sale_graphs','graph_page_title','rent_comp_graphs','market_graphs'));
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
                    $pdf_name = str_replace(' ', '-', $memorandum->property_title) . '-market-analysis.pdf';
                    $job->update(['is_done' => 1]);
                    $memo_file = MemoFile::updateOrCreate([
                        'memorandum_id' => $memorandum->id
                    ],['file_name' => $pdf_name]);
                    $file_path = storage_path('app/public/pdf/'.$pdf_name);
                    @unlink($file_path);
                    return $pdf->save($file_path);
                }//end if memo pages
            }//end foreach loop of jobs
        }//end empty jobs check
    }
}
