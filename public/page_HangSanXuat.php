<div>
    <form action="http://localhost:88/Do_an/HangSanXuat/ThemHang" method="post">
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
        "Không thành công";
  ?>
  <?php } ?>
  </p>
</form>
</div>