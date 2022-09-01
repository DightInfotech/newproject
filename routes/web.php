<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('ajaxRequest', 'AjaxController@ajaxRequest');
Route::post('ajaxRequest', 'AjaxController@ajaxRequestPost');

Route::get('/', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);

Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);

Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);

Route::post('password/reset', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);

Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);
Route::get('', function(){ return view('auth.login'); });
Route::group(['prefix' => 'admin/','middleware' => ['auth','is_admin'] ], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/report_an_issue', 'ReportController@index')->name('report.index');
    Route::post('/report_an_issue', 'ReportController@store')->name('report.store');

    //assets routes
    Route::get('/assets', 'AssetController@index')->name('assets.index');
    Route::get('/assets/create', 'AssetController@create')->name('assets.create');
    Route::post('/assets', 'AssetController@store')->name('assets.store');
    Route::post('/get-asset', 'AssetController@getAsset')->name('assets.get');
    Route::post('/assets/update', 'AssetController@ajaxUpdate')->name('assets.ajax-update');
    Route::post('/assets/delete', 'AssetController@ajaxDelete')->name('assets.ajax-delete');
    Route::post('/assets-upload', 'AssetController@dropzoneFileUpload')->name('upload-assets');

    Route::resource('/users', 'UserController');

    //memorandum basic routes
    Route::get('/memorandums', 'Memorandum\MemorandumController@index')->name('memorandums.index');
    Route::get('/memorandums/{memorandum}', 'Memorandum\MemorandumController@edit')->name('memorandums.edit');
    Route::Delete('memorandums/{memorandum}', 'Memorandum\MemorandumController@destroy')->name('memorandums.destroy');

    //memorandum cover page routes
    Route::get('/cover/page/{memorandum?}', 'Memorandum\MemorandumController@loadCoverPage')->name('load.cover.page');
    Route::post('/cover/page', 'Memorandum\MemorandumController@store')->name('store.memo');
    Route::get('/memo/edit/{memorandum}', 'Memorandum\MemorandumController@edit')->name('edit.memo');
    Route::get('/cover/page/edit/{memorandum}', 'Memorandum\MemorandumController@editCoverPage')->name('edit.cover.page');
    Route::put('/cover/page/update/{memorandum}', 'Memorandum\MemorandumController@update')->name('update.memo');

    //memorandum confidentiality page routes
    Route::get('/confidentiality/page/{memorandum}', 'Memorandum\MemorandumController@loadConfidentialityPage')->name('load.confidentiality.page');
    Route::put('/confidentiality/page/update/{memorandum}', 'Memorandum\MemorandumController@updateConfidentialityPage')->name('update.confidentiality.page');

    //memorandum confidentiality member page routes
    Route::get('/confidentiality/member/page/{memorandum}', 'Memorandum\MemorandumController@loadConfidentialityMemberPage')->name('load.confidentiality.member.page');
    Route::put('/confidentiality/member/page/update/{memorandum}', 'Memorandum\MemorandumController@updateConfidentialityMemberPage')->name('update.confidentiality.member.page');

    //pricing financial cover page routes
    Route::get('/pricing-financial/section/cover/{memorandum}', 'Memorandum\FinancialController@loadSectionCoverPage')->name('load.financial.cover.page');
    Route::put('/pricing-financial/update/cover/{memorandum}', 'Memorandum\FinancialController@updateSectionCoverPage')->name('update.financial.cover.page');

    //pricing financial offering summary page routes
    Route::get('/pricing-financial/offering/summary/{memorandum}', 'Memorandum\FinancialController@loadFinancialOfferingPage')->name('load.financial.offering.summary');
    Route::put('/pricing-financial/update/offering/summary/{memorandum}', 'Memorandum\FinancialController@updateFinancialOfferingPage')->name('update.financial.offering.summary');

    //pricing financial proposed page routes
    Route::get('/pricing-financial/proposed/{memorandum}', 'Memorandum\FinancialController@loadFinancialProposedPage')->name('load.financial.proposed');
    Route::put('/pricing-financial/update/proposed/{memorandum}', 'Memorandum\FinancialController@updateFinancialProposedPage')->name('update.financial.proposed');


    //pricing financial year projections page routes
    Route::get('/pricing-financial/year-projection/{memorandum}', 'Memorandum\FinancialController@loadFinancialProjectionPage')->name('load.financial.projections');
    Route::put('/pricing-financial/update/year-projection/{memorandum}', 'Memorandum\FinancialController@updateFinancialProjectionPage')->name('update.financial.projections');

    //pricing financial unit mix page routes
    Route::get('/pricing-financial/unit-mix/{memorandum}', 'Memorandum\FinancialController@loadFinancialUnitMixPage')->name('load.financial.unit-mix');
    Route::get('/pricing-financial/unit-mix/create/{memorandum}', 'Memorandum\FinancialController@createUnitMix')->name('create.unit-mix');
    Route::post('/pricing-financial/unit-mix/store','Memorandum\FinancialController@storeUnitMix')->name('store.unit-mix');
    Route::get('/pricing-financial/unit-mix/edit/{unit}','Memorandum\FinancialController@editUnitMix')->name('edit.unit-mix');
    Route::put('/pricing-financial/uni-mix/update/{unit}', 'Memorandum\FinancialController@updateUnitMix')->name('update.unit-mix');
    Route::delete('/pricing-financial/uni-mix/delete/{unit}', 'Memorandum\FinancialController@deleteUnitMix')->name('delete.unit-mix');

    //pricing financial projection page routes
    Route::get('/pricing-financial/projection/increment/{memorandum}', 'Memorandum\FinancialController@loadFinancialProjectionIncrement')->name('load.financial.projection-increment');
    Route::get('/pricing-financial/projection/increment/create/{memorandum}', 'Memorandum\FinancialController@createProjectionIncrement')->name('create.projection-increment');
    Route::post('/pricing-financial/projection/increment/store','Memorandum\FinancialController@storeProjectionIncrement')->name('store.projection-increment');
    Route::get('/pricing-financial/projection/increment/edit/{projection}','Memorandum\FinancialController@editProjectionIncrement')->name('edit.projection-increment');
    Route::put('/pricing-financial/projection/increment/update/{projection}', 'Memorandum\FinancialController@updateProjectionIncrement')->name('update.projection-increment');
    Route::delete('/pricing-financial/projection/increment/delete/{projection}', 'Memorandum\FinancialController@deleteProjectionIncrement')->name('delete.projection-increment');

    Route::get('/pricing-financial/unit-mix/graphs/{memorandum}', 'Memorandum\FinancialController@loadUnitMixGraphs')->name('load.financial.unit-mix.graphs');
    Route::put('/pricing-financial/unit-mix/graphs/{memorandum}', 'Memorandum\FinancialController@updateUnitMixGraphs')->name('update.financial.unit-mix.graphs');


    //pricing financial income expenses page routes
    Route::get('/pricing-financial/income-expenses/{memorandum}', 'Memorandum\FinancialController@loadFinancialIncomeExpensesPage')->name('load.financial.income-expenses');
    Route::put('/pricing-financial/update/income-expenses/{memorandum}', 'Memorandum\FinancialController@updateFinancialIncomeExpensesPage')->name('update.financial.income-expenses');

    //pricing financial pricing-proforma routes
    Route::get('/pricing-financial/proforma/{memorandum}', 'Memorandum\FinancialController@loadFinancialPricingProforma')->name('load.financial.pricing-proforma');
    Route::put('/pricing-financial/proforma/update/{memorandum}', 'Memorandum\FinancialController@updateFinancialPricingProforma')->name('update.financial.pricing-proforma');

    //pricing financial pricing-current routes
    Route::get('/pricing-financial/current/{memorandum}', 'Memorandum\FinancialController@loadFinancialPricingCurrent')->name('load.financial.pricing-current');
    Route::put('/pricing-financial/current/update/{memorandum}', 'Memorandum\FinancialController@updateFinancialPricingCurrent')->name('update.financial.pricing-current');

    //exchange options routes
    Route::get('/pricing-financial/exchange/options/{memorandum}', 'Memorandum\FinancialController@loadFinancialExchangeOptions')->name('load.financial.exchange-options');
    Route::put('/pricing-financial/exchange/options/update/{memorandum}', 'Memorandum\FinancialController@updateFinancialExchangeOptions')->name('update.financial.exchange-options');

    //section description cover page routes
    Route::get('/property/description/section/cover/{memorandum}', 'Memorandum\PropertyDescriptionController@loadSectionCoverPage')->name('load.description.cover.page');
    Route::put('/property/description/section/cover/{memorandum}', 'Memorandum\PropertyDescriptionController@updateSectionCoverPage')->name('update.description.cover.page');

    //section description location highlights routes
    Route::get('/property/description/location/highlights/{memorandum}', 'Memorandum\PropertyDescriptionController@loadLocationHighlights')->name('load.description.location.highlights');
    Route::put('/property/description/location/highlights/{memorandum}', 'Memorandum\PropertyDescriptionController@updateLocationHighlights')->name('update.description.location.highlights');

    //section description investment highlights routes
    Route::get('/property/description/investment/highlights/{memorandum}', 'Memorandum\PropertyDescriptionController@loadInvestmentHighlights')->name('load.description.investment.highlights');
    Route::put('/property/description/investment/highlights/{memorandum}', 'Memorandum\PropertyDescriptionController@updateInvestmentHighlights')->name('update.description.investment.highlights');

    //section description investment highlights page2 routes
    Route::get('/property/description/more/investment/highlights/{memorandum}', 'Memorandum\PropertyDescriptionController@loadInvestmentHighlightsMore')->name('load.description.investment.highlights.more');
    Route::put('/property/description/more/investment/highlights/{memorandum}', 'Memorandum\PropertyDescriptionController@updateInvestmentHighlightsMore')->name('update.description.investment.highlights.more');

    //section description property summary routes
    Route::get('/property/description/summary/{memorandum}', 'Memorandum\PropertyDescriptionController@loadPropertySummary')->name('load.description.summary');
    Route::put('/property/description/summary/{memorandum}', 'Memorandum\PropertyDescriptionController@updatePropertySummary')->name('update.description.summary');

    //section description amenities routes
    Route::get('/property/description/amenities/{memorandum}', 'Memorandum\PropertyDescriptionController@loadAmenities')->name('load.description.amenities');
    Route::put('/property/description/amenities/{memorandum}', 'Memorandum\PropertyDescriptionController@updateAmenities')->name('update.description.amenities');

    //section description property gallery templates routes
    Route::get('/property/description/gallery/pages/{memorandum}', 'Memorandum\PropertyDescriptionController@loadDescriptionGallery')->name('load.description.gallery-pages');
    Route::get('/property/description/gallery/pages/create/{memorandum}', 'Memorandum\PropertyDescriptionController@createGalleryTemplate')->name('create.gallery-pages');
    Route::post('/property/description/gallery/pages/store','Memorandum\PropertyDescriptionController@storeDescriptionGallery')->name('store.gallery-pages');
    Route::get('/property/description/gallery/pages/edit/{gallery}','Memorandum\PropertyDescriptionController@editGalleryTemplate')->name('edit.gallery-pages');
    Route::put('/property/description/gallery/update/{gallery}', 'Memorandum\PropertyDescriptionController@updateDescriptionGallery')->name('update.gallery-pages');
    Route::delete('/property/description/gallery/delete/{gallery}', 'Memorandum\PropertyDescriptionController@deleteDescriptionGallery')->name('delete.gallery-pages');

    //plat maps routes
    Route::get('/property/description/plat/maps/{memorandum}', 'Memorandum\PropertyDescriptionController@loadPlatMaps')->name('load.description.plat-maps');
    Route::put('/property/description/plat/maps/{memorandum}', 'Memorandum\PropertyDescriptionController@updatePlatMaps')->name('update.description.plat-maps');

    //area maps routes
    Route::get('/property/description/area/maps/{memorandum}', 'Memorandum\PropertyDescriptionController@loadAreaMaps')->name('load.description.area-maps');
    Route::put('/property/description/area/maps/{memorandum}', 'Memorandum\PropertyDescriptionController@updateAreaMaps')->name('update.description.area-maps');

    //arial photos routes
    Route::get('/property/description/arial/photos/{memorandum}', 'Memorandum\PropertyDescriptionController@loadArialPhotos')->name('load.description.arial-photos');
    Route::put('/property/description/arial/photos/{memorandum}', 'Memorandum\PropertyDescriptionController@updateArialPhotos')->name('update.description.arial-photos');

    //pdf test routes
    Route::get('/memorandum/generate/pages/{memorandum}', 'Memorandum\MemorandumController@generatePdfPages')->name('generate-pages.memo');

    //recent sales section routes
    //Route::resource('recent-sales','RecentSaleController');
    Route::get('/recent/sales/{memorandum}','RecentSaleController@index')->name('recent-sales.index');
    Route::get('/recent/sales/create/{memorandum}','RecentSaleController@create')->name('recent-sales.create');
    Route::post('/recent/sales','RecentSaleController@store')->name('recent-sales.store');
    Route::get('/recent/sales/edit/{sales}','RecentSaleController@edit')->name('recent-sales.edit');
    Route::put('/recent/sales/update/{sales}','RecentSaleController@update')->name('recent-sales.update');
    Route::delete('/recent/sales/delete/{sales}','RecentSaleController@destroy')->name('recent-sales.destroy');

    Route::get('/recent/sales/graphs/{memorandum}','RecentSaleController@loadGraphs')->name('recent-sales.graphs.index');
    Route::get('/recent/sales/create/graph/{memorandum}','RecentSaleController@createGraph')->name('recent-sales.graphs.create');
    Route::post('/recent/sales/store/graph','RecentSaleController@storeGraph')->name('recent-sales.graphs.store');
    Route::get('/recent/sales/graphs/edit/{sales}','RecentSaleController@editGraph')->name('recent-sales.graphs.edit');
    Route::put('/recent/sales/graphs/update/{sales}','RecentSaleController@updateGraph')->name('recent-sales.graphs.update');
    Route::delete('/recent/sales/graphs/delete/{sales}','RecentSaleController@destroyGraph')->name('recent-sales.graphs.destroy');
    //recent sale fields routes
    Route::get('/recent/sales/section/cover/{memorandum}', 'RecentSaleController@loadSectionCoverPage')->name('load.recent-sales.section.cover');
    Route::put('/recent/sales/section/cover/{memorandum}', 'RecentSaleController@updateSectionCoverPage')->name('update.recent-sales.section.cover');
    Route::get('/recent/sales/map/{memorandum}', 'RecentSaleController@loadRecentSaleMap')->name('load.recent-sales.map');
    Route::put('/recent/sales/map/{memorandum}', 'RecentSaleController@updateRecentSaleMap')->name('update.recent-sales.map');

    //rent comparable routes
    Route::get('/rent/comparable/graphs/{memorandum}','RentComparableController@loadGraphs')->name('rent-comparables.graphs.index');
    Route::get('/rent/comparable/create/graph/{memorandum}','RentComparableController@createGraph')->name('rent-comparables.graphs.create');
    Route::post('/rent/comparable/store/graph','RentComparableController@storeGraph')->name('rent-comparables.graphs.store');
    Route::get('/rent/comparable/graphs/edit/{rent}','RentComparableController@editGraph')->name('rent-comparables.graphs.edit');
    Route::put('/rent/comparable/graphs/update/{rent}','RentComparableController@updateGraph')->name('rent-comparables.graphs.update');
    Route::delete('/rent/comparable/graphs/delete/{rent}','RentComparableController@destroyGraph')->name('rent-comparables.graphs.destroy');
    //Route::resource('rent-comparable','RentComparableController');
    Route::get('/rent/comparable/{memorandum}','RentComparableController@index')->name('rent-comparable.index');
    Route::get('/rent/comparable/create/{memorandum}','RentComparableController@create')->name('rent-comparable.create');
    Route::post('/rent/comparable','RentComparableController@store')->name('rent-comparable.store');
    Route::get('/rent/comparable/edit/{rent}','RentComparableController@edit')->name('rent-comparable.edit');
    Route::put('/rent/comparable/update/{rent}','RentComparableController@update')->name('rent-comparable.update');
    Route::delete('/rent/comparable/delete/{rent}','RentComparableController@destroy')->name('rent-comparable.destroy');

    //rent comparable fields routes
    Route::get('/rent/comparables/section/cover/{memorandum}', 'RentComparableController@loadSectionCoverPage')->name('load.rent-comparables.section.cover');
    Route::put('/rent/comparables/section/cover/{memorandum}', 'RentComparableController@updateSectionCoverPage')->name('update.rent-comparables.section.cover');
    Route::get('/rent/comparables/map/{memorandum}', 'RentComparableController@loadRentComparableMap')->name('load.rent-comparables.map');
    Route::put('/rent/comparables/map/{memorandum}', 'RentComparableController@updateRentComparableMap')->name('update.rent-comparables.map');

    Route::get('/rent/comparables/occupancy/graphs/{memorandum}', 'RentComparableController@loadAvgOccupancyGraphs')->name('load.rent-comparable.occupancy.graphs');
    Route::put('/rent/comparables/occupancy/graphs/{memorandum}', 'RentComparableController@updateAvgOccupancyGraphs')->name('update.rent-comparable.occupancy.graphs');

    Route::get('/rent/comparables/rents/graphs/{memorandum}', 'RentComparableController@loadAvgRentGraphs')->name('load.rent-comparable.rents.graphs');
    Route::put('/rent/comparables/rents/graphs/{memorandum}', 'RentComparableController@updateAvgRentGraphs')->name('update.rent-comparable.rents.graphs');

    //demographic analysis section cover routes
    Route::get('/demographic/analysis/section/cover/{memorandum}', 'Memorandum\DemographicController@loadSectionCoverPage')->name('load.demographic.section.cover');
    Route::put('/demographic/analysis/section/cover/{memorandum}', 'Memorandum\DemographicController@updateSectionCoverPage')->name('update.demographic.section.cover');

    //section description property gallery templates routes
    Route::get('/demographic/analysis/pages/{memorandum}', 'Memorandum\DemographicController@loadDemographicPages')->name('load.demographic-pages');
    Route::get('/demographic/analysis/pages/create/{memorandum}', 'Memorandum\DemographicController@createDemographicPages')->name('create.demographic-pages');
    Route::post('/demographic/analysis/pages/store','Memorandum\DemographicController@storeDemographicPages')->name('store.demographic-pages');
    Route::get('/demographic/analysis/pages/edit/{gallery}','Memorandum\DemographicController@editDemographicPages')->name('edit.demographic-pages');
    Route::put('/demographic/analysis/pages/update/{gallery}', 'Memorandum\DemographicController@updateDemographicPages')->name('update.demographic-pages');
    Route::delete('/demographic/analysis/pages/delete/{gallery}', 'Memorandum\DemographicController@deleteDemographicPages')->name('delete.demographic-pages');

    Route::get('/generate/pdf/{memorandum}', 'Memorandum\MemorandumController@generate_pdf')->name('pdf.generate');
    Route::get('/download/pdf/{memorandum}', 'Memorandum\MemorandumController@download_pdf')->name('pdf.download');

    Route::get('/generate/market/pdf/{memorandum}', 'Memorandum\MemorandumController@generate_market_pdf')->name('pdf.market.generate');
    Route::get('/download/market/pdf/{memorandum}', 'Memorandum\MemorandumController@download_market_pdf')->name('pdf.market.download');

    Route::get('pdf/footer', 'Memorandum\MemorandumController@getFooter')->name('pdf.footer');

    Route::get('memorandum/files', 'Memorandum\FileController@index')->name('memo.files');
    Route::get('memorandum/file/send/{file}', 'Memorandum\FileController@send_file')->name('memo.file.send');
    Route::post('memorandum/file/sent', 'Memorandum\FileController@sent_file')->name('memo.file.sent');

    //Market comparables
    //recent sale fields routes
    Route::get('/market/comparable/section/cover/{memorandum}', 'MarketComparableController@loadSectionCoverPage')->name('load.market-comparable.section.cover');
    Route::put('/market/comparable/section/cover/{memorandum}', 'MarketComparableController@updateSectionCoverPage')->name('update.market-comparable.section.cover');
    Route::get('/market/comparable/map/{memorandum}', 'MarketComparableController@loadMarketComparableMap')->name('load.market-comparable.map');
    Route::put('/market/comparable/map/{memorandum}', 'MarketComparableController@updateMarketComparableMap')->name('update.market-comparable.map');
    Route::get('/market/comparable/graphs/{memorandum}', 'MarketComparableController@loadMarketComparableGraphs')->name('load.market-comparable.graphs');
    Route::put('/market/comparable/graphs/{memorandum}', 'MarketComparableController@updateMarketComparableGraphs')->name('update.market-comparable.graphs');

    Route::get('/market/comparable/price/graphs/{memorandum}', 'MarketComparableController@loadMarketComparablePriceGraphs')->name('load.market-comparable.price.graphs');
    Route::put('/market/comparable/price/graphs/{memorandum}', 'MarketComparableController@updateMarketComparablePriceGraphs')->name('update.market-comparable.price.graphs');

    //market comparable graphs
    Route::get('/market/comparable/graphs/{memorandum}','MarketComparableController@loadGraphs')->name('market-comparables.graphs.index');
    Route::get('/market/comparable/create/graph/{memorandum}','MarketComparableController@createGraph')->name('market-comparables.graphs.create');
    Route::post('/market/comparable/store/graph','MarketComparableController@storeGraph')->name('market-comparables.graphs.store');
    Route::get('/market/comparable/graphs/edit/{market}','MarketComparableController@editGraph')->name('market-comparables.graphs.edit');
    Route::put('/market/comparable/graphs/update/{market}','MarketComparableController@updateGraph')->name('market-comparables.graphs.update');
    Route::delete('/market/comparable/graphs/delete/{market}','MarketComparableController@destroyGraph')->name('market-comparables.graphs.destroy');
    //market comparable crud
    Route::get('/market/comparable/{memorandum}','MarketComparableController@index')->name('market-comparable.index');
    Route::get('/market/comparable/create/{memorandum}','MarketComparableController@create')->name('market-comparable.create');
    Route::post('/market/comparable/','MarketComparableController@store')->name('market-comparable.store');
    Route::get('/market/comparable/edit/{market}','MarketComparableController@edit')->name('market-comparable.edit');
    Route::put('/market/comparable/update/{market}','MarketComparableController@update')->name('market-comparable.update');
    Route::delete('/market/comparable/delete/{market}','MarketComparableController@destroy')->name('market-comparable.destroy');

    Route::get('/market/plan/section/cover/{memorandum}', 'Memorandum\MarketPlanController@loadSectionCoverPage')->name('load.market-plan.section.cover');
    Route::put('/market/plan/section/cover/{memorandum}', 'Memorandum\MarketPlanController@updateSectionCoverPage')->name('update.market-plan.section.cover');

    Route::get('/market/plan/timeline/pages/{memorandum}', 'Memorandum\MarketPlanController@loadMarketTimelinePages')->name('load.market-plan.timeline.pages');
    Route::get('/market/plan/timeline/pages/create/{memorandum}', 'Memorandum\MarketPlanController@createMarketTimelinePages')->name('create.market-plan.timeline.pages');
    Route::post('/market/plan/timeline/pages/store','Memorandum\MarketPlanController@storeMarketTimelinePages')->name('store.market-plan.timeline.pages');
    Route::get('/market/plan/timeline/pages/edit/{timeline}','Memorandum\MarketPlanController@editMarketTimelinePages')->name('edit.market-plan.timeline.pages');
    Route::put('/market/plan/timeline/pages/update/{timeline}', 'Memorandum\MarketPlanController@updateMarketTimelinePages')->name('update.market-plan.timeline.pages');
    Route::delete('/market/plan/timeline/pages/delete/{timeline}', 'Memorandum\MarketPlanController@deleteMarketTimelinePages')->name('delete.market-plan.timeline.pages');
});
Route::group([ 'prefix'=>'user', 'middleware' => ['auth','is_user'] ], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('users.dashboard');
});

Route::post('editor/image/upload',function (\Illuminate\Http\Request $request){
    $files = $request->file('file');
    foreach ($files as $file)
        $move = $file->move(storage_path().'/app/public/editor-images/', $file->getClientOriginalName());
    if ($move)
        echo  asset('/storage/editor-images/' . $file->getClientOriginalName());
    else
        echo 'error';

});

Route::get('/load/pdf/{memorandum}', 'Memorandum\MemorandumController@load_pdf')->name('pdf.load');


