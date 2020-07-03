<div>
    <form action="/doan/HangSanXuat/ThemHang" method="post">
  <div class="form-group">
    <label for="ten-hang">Tên Hãng Sản Xuất</label>
    <input type="text" class="form-control" id="ten-hang-sx" placeholder="Tên Hãng Sản Xuất" name="ten-hang" required>
  </div>

  <button type="submit" class="btn btn-primary">Tạo Mới</button>
  <p>
  <?php if(isset($data["kq"])){ ?>
      <?php
      if( $data["kq"])
      echo "Tạo thành công";
      else
        echo "Không thành công";
  ?>
  <?php } ?>
  </p>
</form>
</div>
<!-- Danh sách hãng sx -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Mã hãng sản suất</th>
      <th scope="col">Tên Hãng sản xuất</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
      if (isset($data["dshangsx"])) {
        print_r($data["dshangsx"]);
        $stt = 1;
        foreach ($data["dshangsx"] as $hang) {
      ?>
          <tr>
            <td><?php echo $stt ?></td>
            <td><?php echo $hang['TEN_HANG'] ?></td>
            <td>
              <button type="button" class="btn btn-danger btn-thao-tac">Xóa</button>
              <button type="button" class="btn btn-warning btn-thao-tac">Chỉnh Sửa</button>
            </td>
          </tr>
      <?php
          $stt++;
        }
      }
      ?>
  </tbody>
</table>