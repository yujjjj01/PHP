 @extends('admin.layout')
 @section('title', '大事記列表')
 @section('content')
 <div class="admin-card" data-crud-list>
     <div class="admin-card-header">
         <h2><i class="fa fa-history"></i> 大事記列表</h2>
         <div class="admin-toolbar">
             <!-- 關鍵字即時查詢：輸入時自動篩選並標示關鍵字 -->
             <form class="search-box">
                 <i class="fa fa-search"></i>
                 <input type="search" name="keyword" class="form-control" placeholder="搜尋標題 / 說明 / 標籤 / 年份" autocomplete="off" />
             </form>
             <select name="tag_type" class="form-control" data-filter>
                 <option value="">全部類型</option>
                 <option value="milestone">里程碑</option>
                 <option value="product">產品</option>
                 <option value="award">獲獎 / 認證</option>
             </select>
             <button type="button" class="btn btn-light btn-sm" data-clear><i class="fa fa-times"></i> 清除</button>
             <a href="milestones-form.html" class="btn btn-gold btn-sm"><i class="fa fa-plus"></i> 新增大事記</a>
         </div>
     </div>

     <div class="table-wrap">
         <table class="data-table admin-table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>年月</th>
                     <th>標題</th>
                     <th>類型</th>
                     <th>標籤文字</th>
                     <th>重點</th>
                     <th>操作</th>
                 </tr>
             </thead>
             <tbody>
                 <tr data-row data-tag_type="milestone">
                     <td class="num text-muted">1</td>
                     <td data-mark>2025 / 11</td>
                     <td data-mark>年度客戶感謝活動圓滿落幕</td>
                     <td><span class="badge badge-gold" data-mark>里程碑</span></td>
                     <td data-mark>里程碑</td>
                     <td><span class="badge badge-green">重點</span></td>
                     <td>
                         <div class="actions"><a href="milestones-form.html?id=1" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a><button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="年度客戶感謝活動圓滿落幕"><i class="fa fa-trash"></i> 刪除</button></div>
                     </td>
                 </tr>
                 <tr data-row data-tag_type="product">
                     <td class="num text-muted">2</td>
                     <td data-mark>2025 / 08</td>
                     <td data-mark>全新秋冬系列產品正式發佈</td>
                     <td><span class="badge badge-brand" data-mark>產品</span></td>
                     <td data-mark>產品</td>
                     <td><span class="badge badge-gray">—</span></td>
                     <td>
                         <div class="actions"><a href="milestones-form.html?id=2" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a><button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="全新秋冬系列產品正式發佈"><i class="fa fa-trash"></i> 刪除</button></div>
                     </td>
                 </tr>
                 <tr data-row data-tag_type="award">
                     <td class="num text-muted">3</td>
                     <td data-mark>2025 / 03</td>
                     <td data-mark>榮獲年度最佳品質獎</td>
                     <td><span class="badge badge-green" data-mark>獲獎 / 認證</span></td>
                     <td data-mark>獲獎</td>
                     <td><span class="badge badge-gray">—</span></td>
                     <td>
                         <div class="actions"><a href="milestones-form.html?id=3" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a><button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="榮獲年度最佳品質獎"><i class="fa fa-trash"></i> 刪除</button></div>
                     </td>
                 </tr>
                 <tr data-row data-tag_type="milestone">
                     <td class="num text-muted">4</td>
                     <td data-mark>2024 / 10</td>
                     <td data-mark>電商平台正式上線</td>
                     <td><span class="badge badge-gold" data-mark>里程碑</span></td>
                     <td data-mark>里程碑</td>
                     <td><span class="badge badge-gray">—</span></td>
                     <td>
                         <div class="actions"><a href="milestones-form.html?id=4" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a><button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="電商平台正式上線"><i class="fa fa-trash"></i> 刪除</button></div>
                     </td>
                 </tr>
                 <tr data-row data-tag_type="milestone">
                     <td class="num text-muted">5</td>
                     <td data-mark>2024 / 05</td>
                     <td data-mark>進駐台中全新旗艦店</td>
                     <td><span class="badge badge-gold" data-mark>里程碑</span></td>
                     <td data-mark>展店</td>
                     <td><span class="badge badge-gray">—</span></td>
                     <td>
                         <div class="actions"><a href="milestones-form.html?id=5" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a><button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="進駐台中全新旗艦店"><i class="fa fa-trash"></i> 刪除</button></div>
                     </td>
                 </tr>
                 <tr data-row data-tag_type="award">
                     <td class="num text-muted">6</td>
                     <td data-mark>2024 / 01</td>
                     <td data-mark>ISO 9001 品質認證通過</td>
                     <td><span class="badge badge-green" data-mark>獲獎 / 認證</span></td>
                     <td data-mark>認證</td>
                     <td><span class="badge badge-gray">—</span></td>
                     <td>
                         <div class="actions"><a href="milestones-form.html?id=6" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a><button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="ISO 9001 品質認證通過"><i class="fa fa-trash"></i> 刪除</button></div>
                     </td>
                 </tr>
                 <tr data-row data-tag_type="milestone">
                     <td class="num text-muted">7</td>
                     <td data-mark>2023 / 09</td>
                     <td data-mark>海外市場首次拓展至日本</td>
                     <td><span class="badge badge-gold" data-mark>里程碑</span></td>
                     <td data-mark>里程碑</td>
                     <td><span class="badge badge-gray">—</span></td>
                     <td>
                         <div class="actions"><a href="milestones-form.html?id=7" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a><button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="海外市場首次拓展至日本"><i class="fa fa-trash"></i> 刪除</button></div>
                     </td>
                 </tr>
                 <tr data-row data-tag_type="milestone">
                     <td class="num text-muted">8</td>
                     <td data-mark>2020 / 01</td>
                     <td data-mark>公司正式創立</td>
                     <td><span class="badge badge-gold" data-mark>里程碑</span></td>
                     <td data-mark>創立</td>
                     <td><span class="badge badge-green">重點</span></td>
                     <td>
                         <div class="actions"><a href="milestones-form.html?id=8" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a><button type="button" class="btn btn-danger-outline btn-xs" data-delete data-name="公司正式創立"><i class="fa fa-trash"></i> 刪除</button></div>
                     </td>
                 </tr>
                 <tr data-empty class="hidden">
                     <td colspan="7">
                         <div class="empty-state"><i class="fa fa-search"></i>
                             <p>找不到符合的資料</p>
                         </div>
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>

     <div class="admin-table-info">
         <span>共 <b data-total>8</b> 筆</span>
         <nav class="pagination">
             <span class="disabled"><i class="fa fa-chevron-left"></i></span>
             <span class="active">1</span>
             <span class="disabled"><i class="fa fa-chevron-right"></i></span>
         </nav>
     </div>
 </div>
 @endsection