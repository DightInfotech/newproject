<?php

namespace App\Http\Controllers\Memorandum;

use App\Models\Asset;
use App\Models\Demographic;
use App\Models\GalleryTemplate;
use App\Models\GraphPage;
use App\Models\IncomeExpense;
use App\Models\Job;
use App\Models\MarketComparable;
use App\Models\MarketComparableGraph;
use App\Models\MarketingExchangeOption;
use App\Models\MarketJob;
use App\Models\MarketPage;
use App\Models\MemoPage;
use App\Models\Memorandum;
use App\Models\MemorandumSetting;
use App\Models\MixUnit;
use App\Models\PricingFinancial;
use App\Models\PropertyDescription;
use App\Models\RecentSale;
use App\Models\RecentSaleField;
use App\Models\RecentSaleGraph;
use App\Models\RentComparable;
use App\Models\RentComparableField;
use App\Models\RentComparableGraph;
use App\Models\YearProjection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use PDF;

class MemorandumController extends Controller
{
    public function index(){
        $memorandums = Memorandum::paginate(10);
        return view('backend.memorandums.index', compact('memorandums'));
    }

    public function generatePdfPages($id){
        $memorandum = Memorandum::find($id);
        $memorandum->memo_pages()->delete();
        $gallery_pages = $memorandum->gallery_templates;
        if(!empty($gallery_pages)) {
            $i=18;$page_count = 18+$gallery_pages->count();
            foreach ($gallery_pages as $pg) {
                if($pg->template == '6I'){
                    $template = 'six-images';
                }elseif($pg->template == '2L'){
                    $template = 'two-landscape';
                }else{
                    $template = 'two-portrait';
                }
                $gallery_arr[] = [
                    'memorandum_id' => $id,
                    'title' => $pg->title,
                    'page_number' => $i,
                    'template' => $template,
                    'gallery_ids' => $pg->images,
                ];
                $i++;
            }
        }
        $insert_records = [
            [
                'memorandum_id' => $id,
                'page_number' => 1,
                'template' => 'index',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 2,
                'template' => 'page-2',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 3,
                'template' => 'page-3',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 4,
                'template' => 'page-4',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 5,
                'template' => 'page-5',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 6,
                'template' => 'page-6',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 7,
                'template' => 'page-7',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 8,
                'template' => 'page-8',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 9,
                'template' => 'page-9',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 10,
                'template' => 'page-10',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 11,
                'template' => 'page-11',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 12,
                'template' => 'page-12',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 13,
                'template' => 'page-13',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 14,
                'template' => 'page-14',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 15,
                'template' => 'page-15',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 16,
                'template' => 'page-16',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 17,
                'template' => 'page-17',
            ],
        ];
        MemoPage::insert($insert_records);
        MemoPage::insert($gallery_arr);
        $maps_pages = [
            [
                'memorandum_id' => $id,
                'page_number'   => $page_count,
                'template'      => 'plat-maps'
            ],
            [
                'memorandum_id' => $id,
                'page_number'   => $page_count+1,
                'template'      => 'area-maps'
            ],
            [
                'memorandum_id' => $id,
                'page_number'   => $page_count+2,
                'template'      => 'arial-photos',
            ],
            [
                'memorandum_id' => $id,
                'page_number'   => $page_count+3,
                'template'      => 'recent-sales-cover'
            ],
            [
                'memorandum_id' => $id,
                'page_number'   => $page_count+4,
                'template'      => 'recent-sales-map'
            ],
        ];
        MemoPage::insert($maps_pages);
        $recent_graphs = $memorandum->recent_graphs;
        if(!empty($recent_graphs)) {
            $recent_graph_pages = intval(($recent_graphs->count())/2);
            if(($recent_graphs->count()) % 2 != 0) $recent_graph_pages+=1;
            $page_count = $page_count+5;$skip=0;$graph_ids=[];
            for ($i=$page_count;$i<$page_count+$recent_graph_pages;$i++)
            {
                    $graph_ids = RecentSaleGraph::where('memorandum_id',$id)->skip($skip)->take(2)->pluck('id')->toArray();
                    if(count($graph_ids) > 0) {
                        $graph_rec = RecentSaleGraph::findorfail($graph_ids[0]);
                        $page_title = $graph_rec->page_title;
                    }else{
                        $page_title = 'Recent Sales Graph';
                    }
                    $skip+=2;
                $recent_graph_arr[] = [
                    'memorandum_id' => $id,
                    'title' => $page_title,
                    'page_number' => $i,
                    'template' => 'recent-sales-graph',
                    'recent_graph_ids' => json_encode($graph_ids),
                ];
            }
            $page_count = $page_count + $recent_graph_pages;
            MemoPage::insert($recent_graph_arr);
        }
        $recent_sales = $memorandum->recent_sales;
        if(!empty($recent_sales)) {
            $recent_sale_pages = intval(($recent_sales->count()+1)/3);
            if(($recent_sales->count()+1) % 3 != 0) $recent_sale_pages+=1;
            $page_count = $page_count;$skip=0;
            for ($i=$page_count;$i<$page_count+$recent_sale_pages;$i++)
            {
                if($skip == 0) {
                    $sale_properties = RecentSale::where('memorandum_id',$id)->skip($skip)->take(2)->pluck('id')->toArray();
                    $skip+=2;
                }else{
                    $sale_properties = RecentSale::where('memorandum_id',$id)->skip($skip)->take(3)->pluck('id')->toArray();
                    $skip+=3;
                }
                $recent_sales_arr[] = [
                    'memorandum_id' => $id,
                    'page_number' => $i,
                    'template' => 'recent-sales',
                    'recent_sale_ids' => json_encode($sale_properties),
                ];
            }
            $page_count = $page_count+$recent_sale_pages;
            MemoPage::insert($recent_sales_arr);
        }
        $rent_comp_insert = [
            [
                'memorandum_id' => $id,
                'page_number'   => $page_count,
                'template'      => 'rent-comparable-cover'
            ],
            [
                'memorandum_id' => $id,
                'page_number'   => $page_count+1,
                'template'      => 'rent-comparable-map'
            ],
        ];
        MemoPage::insert($rent_comp_insert);
        $rent_graphs = $memorandum->rent_graphs;
        if(!empty($rent_graphs)) {
            $rent_graph_pages = intval(($rent_graphs->count())/2);
            if(($rent_graphs->count()) % 2 != 0) $rent_graph_pages+=1;
            $page_count = $page_count+2;$skip=0;$graph_ids=[];
            for ($i=$page_count;$i<$page_count+$rent_graph_pages;$i++)
            {
                $graph_ids = RentComparableGraph::where('memorandum_id',$id)->skip($skip)->take(2)->pluck('id')->toArray();
                if(count($graph_ids) > 0) {
                    $graph_rec = RentComparableGraph::findorfail($graph_ids[0]);
                    $page_title = $graph_rec->page_title;
                }else{
                    $page_title = 'Rent Comparable Graph';
                }
                $skip+=2;
                $rent_graph_arr[] = [
                    'memorandum_id' => $id,
                    'title' => $page_title,
                    'page_number' => $i,
                    'template' => 'rent-comparable-graph',
                    'rent_graph_ids' => json_encode($graph_ids),
                ];
            }
            $page_count = $page_count + $rent_graph_pages;
            MemoPage::insert($rent_graph_arr);
        }
        $rent_comps = $memorandum->rent_comparables;
        if(!empty($rent_comps)) {
            $rent_comp_pages = intval(($rent_comps->count()+1)/3);
            if(($rent_comps->count()+1) % 3 != 0) $rent_comp_pages+=1;
            $page_count = $page_count;$skip=0;
            for ($i=$page_count;$i<$page_count+$rent_comp_pages;$i++)
            {
                if($skip == 0) {
                    $rent_properties = RentComparable::where('memorandum_id',$id)->skip($skip)->take(2)->pluck('id')->toArray();
                    $skip+=2;
                }else{
                    $rent_properties = RentComparable::where('memorandum_id',$id)->skip($skip)->take(3)->pluck('id')->toArray();
                    $skip+=3;
                }
                $rent_comp_arr[] = [
                    'memorandum_id' => $id,
                    'page_number' => $i,
                    'template' => 'rent-comparables',
                    'rent_comparable_ids' => json_encode($rent_properties),
                ];

            }
            $page_count = $page_count+$rent_comp_pages;
            MemoPage::insert($rent_comp_arr);
        }
        $demographic_pages = [
            [
                'memorandum_id' => $id,
                'page_number'   => $page_count,
                'template'      => 'demographic-cover'
            ],
        ];
        MemoPage::insert($demographic_pages);
        $demographic_pages = $memorandum->demographic_pages;
        if(!empty($demographic_pages)) {
            $i=1;$demographic_arr = [];
            foreach ($demographic_pages as $pg) {
                if($pg->template == '1C'){
                    $template = 'one-centered-demographic';
                }elseif($pg->template == '2P'){
                    $template = 'two-portrait-demographic';
                }
                $demographic_arr[] = [
                    'memorandum_id' => $id,
                    'title'         => $pg->title,
                    'page_number'   => $page_count+$i,
                    'template'      => $template,
                    'demographic_ids'   => $pg->images,
                ];
                $i++;
            }
        }
        MemoPage::insert($demographic_arr);
        return true;
    }
    public function generateMarketPages($id)
    {
        $memorandum = Memorandum::find($id);
        $memorandum->market_pages()->delete();
        $sales_range = MarketingExchangeOption::where('memorandum_id',$memorandum->id)->first();

        $insert_records = [
            [
                'memorandum_id' => $id,
                'page_number' => 1,
                'template' => 'index-market',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 2,
                'template' => 'page-2',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 3,
                'template' => 'page-3-market',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 4,
                'template' => 'page-4',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 5,
                'template' => 'page-5',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 6,
                'template' => 'page-6',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 7,
                'template' => 'page-7',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 8,
                'template' => 'page-8',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 9,
                'template' => 'page-9',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 10,
                'template' => 'pricing-current',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => 11,
                'template' => 'pricing-proforma',
            ],
        ];
        MarketPage::insert($insert_records);
        if($sales_range->is_skipped == 0){
            $exchange_options = [
                [
                'memorandum_id' => $id,
                'page_number' => 12,
                'template' => 'exchange-options'
                ]
            ];
            MarketPage::insert($exchange_options);
            $page_number = 13;
        }else{
            $page_number = 12;
        }
        $insert_more_records = [
            [
                'memorandum_id' => $id,
                'page_number' => $page_number,
                'template' => 'page-10',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_number+1,
                'template' => 'page-11',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_number+2,
                'template' => 'page-12',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_number+3,
                'template' => 'page-13',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_number+4,
                'template' => 'page-14',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_number+5,
                'template' => 'page-15',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_number+6,
                'template' => 'page-16',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_number+7,
                'template' => 'page-17',
            ],
        ];
        $page_count = $page_number+8;
        MarketPage::insert($insert_more_records);
        $gallery_pages = $memorandum->gallery_templates;
        if (!empty($gallery_pages)) {
            $i = $page_count;

            foreach ($gallery_pages as $pg) {
                if ($pg->template == '6I') {
                    $template = 'six-images';
                } elseif ($pg->template == '2L') {
                    $template = 'two-landscape';
                } else {
                    $template = 'two-portrait';
                }
                $gallery_arr[] = [
                    'memorandum_id' => $id,
                    'title' => $pg->title,
                    'page_number' => $i,
                    'template' => $template,
                    'gallery_ids' => $pg->images,
                ];
                $i++;
            }
            $page_count = $page_count + $gallery_pages->count();
        }
        MarketPage::insert($gallery_arr);
        $maps_pages = [
            [
                'memorandum_id' => $id,
                'page_number' => $page_count,
                'template' => 'plat-maps'
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_count + 1,
                'template' => 'area-maps'
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_count + 2,
                'template' => 'arial-photos',
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_count + 3,
                'template' => 'recent-sales-cover'
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_count + 4,
                'template' => 'recent-sales-map'
            ],
        ];
        MarketPage::insert($maps_pages);
        $recent_graphs = $memorandum->recent_graphs;
        if(!empty($recent_graphs)) {
            $recent_graph_pages = intval(($recent_graphs->count())/2);
            if(($recent_graphs->count()) % 2 != 0) $recent_graph_pages+=1;
            $page_count = $page_count+5;$skip=0;$graph_ids=[];
            for ($i=$page_count;$i<$page_count+$recent_graph_pages;$i++)
            {
                $graph_ids = RecentSaleGraph::where('memorandum_id',$id)->skip($skip)->take(2)->pluck('id')->toArray();
                if(count($graph_ids) > 0) {
                    $graph_rec = RecentSaleGraph::findorfail($graph_ids[0]);
                    $page_title = $graph_rec->page_title;
                }else{
                    $page_title = 'Recent Sales Graph';
                }
                $skip+=2;
                $recent_graph_arr[] = [
                    'memorandum_id' => $id,
                    'title' => $page_title,
                    'page_number' => $i,
                    'template' => 'recent-sales-graph',
                    'recent_graph_ids' => json_encode($graph_ids),
                ];
            }
            $page_count = $page_count + $recent_graph_pages;
            MarketPage::insert($recent_graph_arr);
        }
        $recent_sales = $memorandum->recent_sales;
        if (!empty($recent_sales)) {
            $recent_sale_pages = intval(($recent_sales->count() + 1) / 3);
            if (($recent_sales->count() + 1) % 3 != 0) $recent_sale_pages += 1;
            $page_count = $page_count;
            $skip = 0;
            for ($i = $page_count; $i < $page_count + $recent_sale_pages; $i++) {
                if ($skip == 0) {
                    $sale_properties = RecentSale::where('memorandum_id', $id)->skip($skip)->take(2)->pluck('id')->toArray();
                    $skip += 2;
                } else {
                    $sale_properties = RecentSale::where('memorandum_id', $id)->skip($skip)->take(3)->pluck('id')->toArray();
                    $skip += 3;
                }
                $recent_sales_arr[] = [
                    'memorandum_id' => $id,
                    'page_number' => $i,
                    'template' => 'recent-sales',
                    'recent_sale_ids' => json_encode($sale_properties),
                ];
            }
            $page_count = $page_count + $recent_sale_pages;
            MarketPage::insert($recent_sales_arr);
        }
        $market_static_pages = [
            [
                'memorandum_id' => $id,
                'page_number' => $page_count,
                'template' => 'market-comparable-cover'
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_count+1,
                'template' => 'market-comparable-map'
            ],
        ];
        MarketPage::insert($market_static_pages);
        $market_graphs = $memorandum->market_graphs;
        if(!empty($market_graphs)) {
            $market_graph_pages = intval(($market_graphs->count())/2);
            if(($market_graphs->count()) % 2 != 0) $market_graph_pages+=1;
            $page_count = $page_count+2;$skip=0;$graph_ids=[];
            for ($i=$page_count;$i<$page_count+$market_graph_pages;$i++)
            {
                $graph_ids = MarketComparableGraph::where('memorandum_id',$id)->skip($skip)->take(2)->pluck('id')->toArray();
                if(count($graph_ids) > 0) {
                    $graph_rec = MarketComparableGraph::findorfail($graph_ids[0]);
                    $page_title = $graph_rec->page_title;
                }else{
                    $page_title = 'Market Comparable Graph';
                }
                $skip+=2;
                $market_graph_arr[] = [
                    'memorandum_id' => $id,
                    'title' => $page_title,
                    'page_number' => $i,
                    'template' => 'market-comparable-graph',
                    'market_graph_ids' => json_encode($graph_ids),
                ];
            }
            $page_count = $page_count + $market_graph_pages;
            MarketPage::insert($market_graph_arr);
        }
        $market_comparables = $memorandum->market_comparables;
        if (!empty($market_comparables)) {
            if($market_comparables->count() < 2){
                $market_comp_pages  = 1;
            }else {
                $market_comp_pages = intval(($market_comparables->count() + 1) / 3);
                if (($market_comparables->count() + 1) % 3 != 0) $market_comp_pages += 1;
            }
            $page_count = $page_count;
            $skip = 0;
            for ($i = $page_count; $i < $page_count + $market_comp_pages; $i++) {
                if ($skip == 0) {
                    $market_properties = MarketComparable::where('memorandum_id', $id)->skip($skip)->take(2)->pluck('id')->toArray();
                    $skip += 2;
                } else {
                    $market_properties = MarketComparable::where('memorandum_id', $id)->skip($skip)->take(3)->pluck('id')->toArray();
                    $skip += 3;
                }
                $market_comp_arr[] = [
                    'memorandum_id' => $id,
                    'page_number' => $i,
                    'template' => 'market-comparables',
                    'market_comparable_ids' => json_encode($market_properties),
                ];
            }
            $page_count = $page_count + $market_comp_pages;
            MarketPage::insert($market_comp_arr);
        }
        $rent_comp_insert = [
            [
                'memorandum_id' => $id,
                'page_number' => $page_count,
                'template' => 'rent-comparable-cover'
            ],
            [
                'memorandum_id' => $id,
                'page_number' => $page_count+1,
                'template' => 'rent-comparable-map'
            ],
        ];
        MarketPage::insert($rent_comp_insert);
        $rent_graphs = $memorandum->rent_graphs;
        if(!empty($rent_graphs)) {
            $rent_graph_pages = intval(($rent_graphs->count())/2);
            if(($rent_graphs->count()) % 2 != 0) $rent_graph_pages+=1;
            $page_count = $page_count+2;$skip=0;$graph_ids=[];
            for ($i=$page_count;$i<$page_count+$rent_graph_pages;$i++)
            {
                $graph_ids = RentComparableGraph::where('memorandum_id',$id)->skip($skip)->take(2)->pluck('id')->toArray();
                if(count($graph_ids) > 0) {
                    $graph_rec = RentComparableGraph::findorfail($graph_ids[0]);
                    $page_title = $graph_rec->page_title;
                }else{
                    $page_title = 'Rent Comparable Graph';
                }
                $skip+=2;
                $rent_graph_arr[] = [
                    'memorandum_id' => $id,
                    'title' => $page_title,
                    'page_number' => $i,
                    'template' => 'rent-comparable-graph',
                    'rent_graph_ids' => json_encode($graph_ids),
                ];
            }
            $page_count = $page_count + $rent_graph_pages;
            MarketPage::insert($rent_graph_arr);
        }
        $rent_comps = $memorandum->rent_comparables;
        if (!empty($rent_comps)) {
            $rent_comp_pages = intval(($rent_comps->count() + 1) / 3);
            if (($rent_comps->count() + 1) % 3 != 0) $rent_comp_pages += 1;
            $page_count = $page_count;
            $skip = 0;
            for ($i = $page_count; $i < $page_count + $rent_comp_pages; $i++) {
                if ($skip == 0) {
                    $rent_properties = RentComparable::where('memorandum_id', $id)->skip($skip)->take(2)->pluck('id')->toArray();
                    $skip += 2;
                } else {
                    $rent_properties = RentComparable::where('memorandum_id', $id)->skip($skip)->take(3)->pluck('id')->toArray();
                    $skip += 3;
                }
                $rent_comp_arr[] = [
                    'memorandum_id' => $id,
                    'page_number' => $i,
                    'template' => 'rent-comparables',
                    'rent_comparable_ids' => json_encode($rent_properties),
                ];

            }
            $page_count = $page_count + $rent_comp_pages;
            MarketPage::insert($rent_comp_arr);
        }
        $demographic_pages = [
            [
                'memorandum_id' => $id,
                'page_number' => $page_count,
                'template' => 'demographic-cover'
            ],
        ];
        MarketPage::insert($demographic_pages);
        $demographic_pages = $memorandum->demographic_pages;
        if(!empty($demographic_pages)) {
            $i=1; $demographic_arr = [];
            foreach ($demographic_pages as $pg) {
                if($pg->template == '1C'){
                    $template = 'one-centered-demographic';
                }elseif($pg->template == '2P'){
                    $template = 'two-portrait-demographic';
                }
                $demographic_arr[] = [
                    'memorandum_id' => $id,
                    'title'         => $pg->title,
                    'page_number'   => $page_count+$i,
                    'template'      => $template,
                    'demographic_ids'=> $pg->images,
                ];
                $i++;
            }
            $page_count = $page_count+$i;
        }
        MarketPage::insert($demographic_arr);
        $market_plan_pages = [
            [
                'memorandum_id' => $id,
                'page_number' => $page_count,
                'template' => 'market-plan-cover'
            ],
        ];
        MarketPage::insert($market_plan_pages);
        $timeline_pages = $memorandum->timeline_pages;
        if(!empty($timeline_pages)) {
            $i=1; $timeline_arr = [];
            foreach ($timeline_pages as $pg) {
                $template = 'market-plan-timeline';
                $timeline_arr[] = [
                    'memorandum_id' => $id,
                    'title'         => $pg->title,
                    'page_number'   => $page_count+$i,
                    'template'      => $template,
                    'timeline_id'   => $pg->id,
                ];
                $i++;
            }
        }
        MarketPage::insert($timeline_arr);
        return true;
    }
    public function load_pdf($id){
        $memorandum = Memorandum::find($id);
        $memo_pages = $memorandum->memo_pages;
        if(!empty($memo_pages)){
            $pages = array();$i=0;$j=0;$k=0;
            $pf = PricingFinancial::where('memorandum_id',$id)->first();
            $mix_units = MixUnit::where('memorandum_id',$id)->get();
            $in_exp = IncomeExpense::where('memorandum_id',$id)->first();
            $yp = YearProjection::where('memorandum_id',$id)->first();
            $pd = PropertyDescription::where('memorandum_id',$id)->first();
            $rsf = RecentSaleField::where('memorandum_id',$id)->first();
            $rent_comparables = RentComparable::where('memorandum_id',$id)->get();
            $rcf = RentComparableField::where('memorandum_id',$id)->first();
            $demographic = Demographic::where('memorandum_id',$id)->first();
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
                }elseif($memo->template == 'rent-comparables'){
                    $rent_ids = json_decode($memo->rent_comparable_ids);
                    $rent_comparables = RentComparable::whereIn('id',$rent_ids)->get();
                    $k=$k+1;
                }
                $page_number = $memo->page_number;
                $pages[] = View::make('memorandum-pages.' . $memo->template,
                    compact('memorandum', 'page_number','pf', 'pd', 'mix_units', 'yp', 'in_exp', 'gallery','gallery_title', 'recent_sales', 'rent_comparables', 'rsf', 'rcf', 'demographic','j','k',
                        'pricing_section_number','desc_section_number','recent_section_number','rent_section_number','demographic_section_number'));
                $i++;

            }

            return view('memorandum-pages.load-pdf',['page_number' => $page_number,'pages' => $pages,'memorandum' => $memorandum]);
        }
    }
    public function generate_pdf($id){
        $memorandum = Memorandum::find($id);
        $isExist = Job::where('memorandum_id',$memorandum->id)->first();
        if(!empty($isExist)){
            if($isExist->is_done == 0){
                flash('Pdf generation has been in process. You would be mailed after completion.','warning');
                return redirect()->back();
            }
            $this->generatePdfPages($memorandum->id);
            $isExist->update(['is_done' => 0]);
            flash('Pdf has been requested to re-generate.','success');
            return redirect()->back();
        }
        $this->generatePdfPages($memorandum->id);
        Job::create([
            'memorandum_id' => $memorandum->id,
            'is_done'   => 0
        ]);
        flash('Pdf generation process has been started in background. you would be mailed after completion.','success');
        return redirect()->back();
    }

    public function generate_market_pdf($id){
        $memorandum = Memorandum::find($id);
        $isExist = MarketJob::where('memorandum_id',$memorandum->id)->first();
        if(!empty($isExist)){
            if($isExist->is_done == 0){
                flash('Pdf generation has been in process. You would be mailed after completion.','warning');
                return redirect()->back();
            }
            $this->generateMarketPages($memorandum->id);
            $isExist->update(['is_done' => 0]);
            flash('Pdf has been requested to re-generate.','success');
            return redirect()->back();
        }
        $this->generateMarketPages($memorandum->id);
        MarketJob::create([
            'memorandum_id' => $memorandum->id,
            'is_done'   => 0
        ]);
        flash('Pdf generation process of market analysis has been started in background. you would be mailed after completion.','success');
        return redirect()->back();
    }

    public function download_pdf($id){
        $memorandum = Memorandum::find($id);
        $pdf_name = str_replace(' ', '-', $memorandum->property_title) . '.pdf';
        return response()->download(storage_path('app/public/pdf/'.$pdf_name));
    }

    public function download_market_pdf($id){
        $memorandum = Memorandum::find($id);
        $pdf_name = str_replace(' ', '-', $memorandum->property_title) . '-market-analysis.pdf';
        return response()->download(storage_path('app/public/pdf/'.$pdf_name));
    }

    public function getFooter(){
        return view('memorandum-pages.footer');
    }

    public function loadCoverPage(){
        $assets = Asset::all();
        return view('backend.memorandums.cover-page',compact('assets'));
    }

    public function store(Request $request){
        $this->storeValidator($request->all())->validate();
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $memorandum = Memorandum::create($data);
        MemorandumSetting::updateOrCreate(
            ['memorandum_id' => $memorandum->id],
            [
                'memorandum_id' => $memorandum->id,
                'current_url' => 'admin/cover/page/edit/'.$memorandum->id,
                'progress_counter' => '0'
            ]
        );
        return redirect()->route('load.confidentiality.page',$memorandum->id);
    }

    public function edit($id){
        $memorandum = Memorandum::findOrFail($id);
        return redirect($memorandum->memorandum_setting->current_url);
    }

    public function editCoverPage(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        MemorandumSetting::updateOrCreate(
            ['memorandum_id' => $id],
            [
                'current_url' => $request->path(),
                'progress_counter' => '0'
            ]
        );
        $assets = Asset::all();
        return view('backend.memorandums.cover-page-edit', compact('memorandum','assets'));
    }

    public function update(Request $request,$id) {
        $this->storeValidator($request->all())->validate();
        Memorandum::updateOrCreate(
            ['id' => $id],
            $request->all()
        );
        return redirect()->route('load.confidentiality.page',$id);

    }

    public function loadConfidentialityPage(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '3'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.confidentiality-page', compact('pro_bar','memorandum','assets'));
    }

    public function updateConfidentialityPage(Request $request, $id){
        $this->confidentailityValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->update([
            'text' => $request->text,
            'footer' => $request->footer
        ]);

        return redirect()->route('load.confidentiality.member.page', $memorandum->id);
    }

    public function loadConfidentialityMemberPage(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $assets = Asset::all();
        MemorandumSetting::updateOrCreate(
            ['memorandum_id' => $id],
            [
                'memorandum_id' => $id,
                'current_url' => $request->path(),
                'progress_counter' => '6'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.confidentiality-member-page', compact('pro_bar', 'assets','memorandum'));
    }

    public function updateConfidentialityMemberPage(Request $request, $id){
        $this->confidentailityMemeberValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->update($request->all());
        return redirect()->route('load.financial.cover.page', $id);
    }

    public function destroy($id){
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->members()->delete();
        $memorandum->page_five()->delete();
        $memorandum->page_six()->delete();
        $memorandum->page_seven()->delete();
       // $memorandum->page_eight->delete();
        $memorandum->page_nine()->delete();
        $memorandum->page_eleven()->delete();
        $memorandum->page_twelve()->delete();
        $memorandum->page_thirteen()->delete();
        //$memorandum->page_fourteen->delete();
        $memorandum->page_fifteen()->delete();
        $memorandum->page_sixteen()->delete();
        $memorandum->page_seventeen()->delete();
        $memorandum->page_eighteen()->delete();
        $memorandum->page_nineteen()->delete();
        $memorandum->page_twenty()->delete();
        $memorandum->page_twentyone()->delete();
        $memorandum->page_twentytwo()->delete();
        $memorandum->page_twentythree()->delete();
        $memorandum->page_twentyfour()->delete();
        $memorandum->page_twentyfive()->delete();
        //$memorandum->page_twentysix->delete();
        //$memorandum->page_twentyseven->delete();
        $memorandum->page_twentyeight()->delete();
        $memorandum->page_twentynine()->delete();
        $memorandum->page_thirty()->delete();
        $memorandum->page_thirtyone()->delete();
        //$memorandum->page_thirtytwo->delete();
        //$memorandum->page_thirtythree->delete();
        $memorandum->page_thirtyfour()->delete();
        $memorandum->page_thirtyfive()->delete();
        $memorandum->delete();

        return back()->with('success', 'Memorandum has been deleted successfully.');
    }

    public function storeValidator(array $data){
        return Validator::make($data, [
            'property_title' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'cover_page_image' => 'required|string',
        ],[
            'cover_page_image.required' => 'The Page Image is required.'
        ]);
    }
    public function confidentailityValidator(array $data){
        return Validator::make( $data, [
            'text' => 'string',
            'footer' => 'string'
        ]);
    }
    public function confidentailityMemeberValidator(array $data)
    {
        return Validator::make($data, [
            'photo.*' => 'sometimes|mimes:png,jpg,jpeg',
            'full_name.*' => 'sometimes|string',
            'title.*' => 'sometimes|string',
            'business_card.*' => 'sometimes|mimes:png,jpg,jpeg'
        ]);
    }
}
