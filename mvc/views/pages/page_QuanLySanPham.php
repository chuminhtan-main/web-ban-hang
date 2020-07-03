

<h4 class="tittle">Thêm sản phẩm</h4>
<form action="/doan/QuanLySanPham/ThemSanPham" method="post" enctype="multipart/form-data">
    <table class="form">               
        <tr>
            <td>
                <label>Tên</label>
            </td>
            <td>
                <input type="text" name="productName" placeholder="Nhập tên sản phẩm..." class="medium" />
            </td>
        </tr>
        <tr>
            <td>
                <label>Hãng sản xuất</label>
            </td>
            <td>
                <select id="select" name="hangsx">
                    <?php
                    if (isset($data["dshangsx"])) {
                      foreach ($data["dshangsx"] as $value) {
                    ?>
                    <option value="<?php echo $value['MA_HANG'] ?>"><?php echo $value['TEN_HANG']?></option>                        
                    <?php
                    }}
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label>CPU</label>
            </td>
            <td>
                <select id="select" name="CPU">
                    <?php
                    if (isset($data["dsCPU"])) {
                      foreach ($data["dsCPU"] as $value) {
                    ?>
                    <option value="<?php echo $value['MA_CPU'] ?>"><?php echo $value['TEN_CPU']?></option>                        
                    <?php
                    }}
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label>RAM</label>
            </td>
            <td>
                <select id="select" name="RAM">
                    <?php
                    if (isset($data["dsRAM"])) {
                      foreach ($data["dsRAM"] as $value) {
                    ?>
                    <option value="<?php echo $value['MA_RAM'] ?>"><?php echo $value['BO_NHO']." GB"?></option>                        
                    <?php
                    }}
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label for="detail">Mô tả</label><br>
            </td>
            <td>
                <textarea class="ckeditor" row="10" cols="50" name="mo-ta"></textarea><br>
            </td>
        </tr>
        <tr>
            <td>
                <label>Giá</label>
            </td>
            <td>
                <input name="price" type="text" placeholder="Nhập giá..." class="medium" />
            </td>
        </tr>
        <tr>
            <td>
                <label>Trạng thái</label>
            </td>
            <td>
                <select class="trangthai-select" name="trangthai">
                <option value="1">Còn hàng</option>
                <option value="2">Hết hàng</option>
      </select>
            </td>
        </tr>

        <tr>
            <td>
                <label>Hình ảnh</label>
            </td>
            <td>
                <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                
            </td>
        </tr>
    </table>
    <?php if (isset($data["kq"])) {
    if ($data["kq"] == 'true')
      echo "Thành công";
    else
      echo "Không thành công";
  } ?>
</form>