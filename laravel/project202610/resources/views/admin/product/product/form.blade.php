<div class="form-row">
    <div class="form-group">
        <label class="form-label" for="f_product_category_id">分類 <span class="req">*</span></label>
        <select id="f_product_category_id" name="product_category_id" class="form-control" required>
            <option value="">請選擇分類</option>
            @foreach($types as $data)
            <option value="{{$data->id}}">{{$data->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label" for="f_product_no">商品編號 <span class="req">*</span></label>
        <input type="text" id="f_product_no" name="product_no" value="" class="form-control" required placeholder="A-00123">
    </div>
</div>
<div class="form-group">
    <label class="form-label" for="f_title">商品名稱 <span class="req">*</span></label>
    <input type="text" id="f_title" name="title" value="" class="form-control" required>
</div>
<div class="form-group">
    <label class="form-label" for="f_subtitle">副標題</label>
    <input type="text" id="f_subtitle" name="subtitle" value="" class="form-control">
</div>
<div class="form-row-3">
    <div class="form-group">
        <label class="form-label" for="f_price">售價 <span class="req">*</span></label>
        <input type="number" id="f_price" name="price" value="" class="form-control" min="0" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="f_original_price">原價（選填）</label>
        <input type="number" id="f_original_price" name="original_price" value="" class="form-control" min="0">
    </div>
    <div class="form-group">
        <label class="form-label" for="f_stock">庫存</label>
        <input type="number" id="f_stock" name="stock" value="100" class="form-control" min="0">
    </div>
</div>
<div class="form-row">
    <div class="form-group">
        <label class="form-label" for="f_badge">標籤</label>
        <input type="text" id="f_badge" name="badge" value="" class="form-control" placeholder="新品 / 熱銷 / HOT">
    </div>
    <div class="form-group">
        <label class="form-label" for="f_icon">無圖片時的圖示</label>
        <div class="input-icon-wrap">
            <i class="fa fa-cube icon" id="f_icon_icon"></i>
            <input type="text" id="f_icon" name="icon" value="fa-cube" class="form-control" placeholder="fa-star" data-icon-preview="f_icon_icon">
        </div>
    </div>
</div>
<div class="form-group">
    <label class="form-label" for="f_image">商品圖片</label>
    <input type="file" id="f_image" name="image" accept="image/*" class="form-control" data-preview="f_image_preview">
    <img id="f_image_preview" class="img-preview hidden" alt="">
</div>
<div class="form-group">
    <label class="form-label" for="f_specs">規格</label>
    <textarea id="f_specs" name="specs" rows="6" class="form-control"></textarea>
    <p class="field-hint">一行一筆，格式：名稱|內容，例：材質|天然素材</p>
</div>
<div class="form-group">
    <label class="form-label" for="f_content">商品說明</label>
    <textarea id="f_content" name="content" rows="10" class="form-control font-en"></textarea>
    <p class="field-hint">可使用 HTML：&lt;h3&gt;小標&lt;/h3&gt;、&lt;p&gt;段落&lt;/p&gt;</p>
</div>
<div class="form-group">
    <label class="form-label" for="f_sort">排序</label>
    <input type="number" id="f_sort" name="sort" value="" class="form-control" min="0">
</div>
<div class="form-group">
    <label class="form-check"><input type="checkbox" name="is_featured" value="1"> 首頁精選</label>
</div>
<div class="form-group">
    <label class="form-check"><input type="checkbox" name="is_active" value="1" checked> 上架</label>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
    <a href="/admin/product/list" class="btn btn-outline"><i class="fa fa-times"></i> 取消</a>
</div>