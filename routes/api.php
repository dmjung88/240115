<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BondController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\View\ViewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| 응용 프로그램의 API 경로를 등록할 수 있는 곳입니다
| 루트가 그룹 내에서 RouteServiceProvider에 의해 로드됩니다
| 'API' 미들웨어 그룹으로 지정되었습니다. API 구축을 즐겨보세요!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//CommonController
Route::prefix('common')->group(function () {
    Route::post('/search/wholesale', [CommonController::class, 'wholeSaleSearch']);
    Route::post('/search/wholesaleBizNum', [CommonController::class, 'wholesaleBizNumSearch']);
    Route::post('/search/store', [CommonController::class, 'storeSearch']);
    Route::post('/search/goods', [CommonController::class, 'goodsSearch']);
    Route::post('/search/maker', [CommonController::class, 'makerSearch']);
    Route::post('/search/goodsType', [CommonController::class, 'goodsType']);
    Route::post('/view/wholesaleEmail', [CommonController::class, 'wholesaleEmailCheck']);
    Route::post('/search/fix', [CommonController::class, 'fixDataSearch']);
    Route::post('/mypage', [CommonController::class, 'myPage']);
    Route::post('/mypageSave', [CommonController::class, 'mypageSave']);
    Route::post('/emp/save', [CommonController::class, 'empSave']);
    Route::post('/emp/codeCheck', [CommonController::class, 'empNumCheck']);
    Route::post('/emp/empNameSearch', [CommonController::class, 'empNameSearch']);
});

//MasterController
Route::prefix('master')->group(function () {

    //입력 모드
    Route::post('/wholesale', [MasterController::class, 'wholesaleSave']);
    Route::post('/store', [MasterController::class, 'storeSave'])->name('master.storeSave');
    Route::post('/storeNewSave', [MasterController::class, 'storeNewSave'])->name('master.storeNewSave');
    Route::post('/goods', [MasterController::class, 'goodsSave'])->name('master.goodsSave');
    Route::post('/fix', [MasterController::class, 'fixSave'])->name('master.fixSave');
    Route::post('/employee', [MasterController::class, 'employeeSave'])->name('master.empSave');

    //수정 모드
    Route::post('/wholesaleUpdate', [MasterController::class, 'wholeSaleUpdate']);
    Route::post('/storeUpdate', [MasterController::class, 'storeUpdate']);
    Route::post('/goodsUpdate', [MasterController::class, 'goodsUpdate']);
    Route::post('/fixUpdate', [MasterController::class, 'fixUpdate']);

    // 사업자번호
    Route::post('/storeNumCheck',[MasterController::class, 'storeNumCheck'])->name('master.storeNumCheck');

});

//WorkController
Route::prefix('work')->group(function () {  
    Route::post('/receive', [WorkController::class, 'receiveSave'])->name('work.receiveSave');
    Route::post('/codeSearch', [WorkController::class, 'codeSearch'])->name('work.codeSearch');
    Route::post('/salesSave', [WorkController::class, 'salesSave'])->name('work.salesSave');
    Route::post('/workProSave', [WorkController::class, 'workProSave'])->name('work.workProSave');
    Route::post('/workModify', [WorkController::class, 'workModify'])->name('work.workModify');
    Route::get('/workProBlueTable', [WorkController::class, 'workProBlueTable'])->name('work.workProBlueTable');
    Route::get('/workProModal', [WorkController::class, 'workProModal'])->name('work.workProModal');
    Route::get('/fixSalseData', [WorkController::class, 'fixSalseData'])->name('work.fixSalseData');
});

//ReportController
Route::prefix('report')->group(function() {
    Route::get('/reportNewSearch', [ReportController::class, 'reportNewSearch'])->name('report.reportNewSearch');
    Route::get('/reportStockSearch', [ReportController::class, 'reportStockSearch'])->name('report.reportStockSearch');
    Route::get('/reportOutputSimple', [ReportController::class, 'reportOutputSimple'])->name('report.reportOutputSimple');
    Route::get('/recallAfterRelease', [ReportController::class, 'recallAfterRelease'])->name('report.recallAfterRelease'); 
    Route::get('/recallStat', [ReportController::class, 'recallStat'])->name('report.recallStat'); 
    Route::get('/aftetServiceStat', [ReportController::class, 'aftetServiceStat'])->name('report.aftetServiceStat'); 
    Route::get('/aggregateByWhole', [ReportController::class, 'aggregateByWhole'])->name('report.aggregateByWhole'); 

});

//BondController
Route::prefix('bond')->group(function() {
    Route::get('/bondPublish', [BondController::class, 'bondPublish'])->name('bond.bondPublish');
    Route::get('/bondPublishDetail', [BondController::class, 'bondPublishDetail'])->name('bond.bondPublishDetail');
    Route::get('/{wholesaleCode}', [BondController::class, 'wholeSearch'])->name('bond.wholeSearch');
    Route::get('/{wholesaleCode}/{date}', [BondController::class, 'wholeSearchByDate'])->name('bond.wholeSearchByDate');
});

//TaxController
Route::prefix('taxInvoice')->group(function() {
    Route::get('/{wholesaleCode}', [TaxController::class, 'taxExcelSearch'])->name('tax.taxExcelSearch');
});

//관리자페이지의 회사정보 리스트 출력
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/list', [ViewController::class, 'adminList'])->name('adminList');
});