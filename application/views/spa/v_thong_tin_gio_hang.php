<?php
if($gio_hang)
{
?>
<h2>Striped Rows</h2>
  <p>Thông tin giỏ hàng của bạn</p>            
<form action="" method="post">
  <table class="table table-striped">
    <thead>
      <tr>
        <td>STT</td>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Đơn giá</td>
        <td>Số lượng</td>
        <td>Thành tiền</td>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach($gio_hang as $item)
    {
    ?>
    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $item['id']?></td>
        <td><?php echo $item['name']?></td>
        <td align="right"><?php echo number_format($item['price'])?></td>
        <td align="right">
            <input type="number" name="<?php echo $item['rowid']?>" value="<?php echo $item['qty']?>"/>
        </td>
        <td align="right"><?php echo number_format($item['price']*$item['qty'])?></td>
      </tr>
    <?php
    $i++;
    }
    ?>      
    <tr>
        <td colspan="5"  align="right">Tổng trị giá hóa đơn</td>
        <td align="right"><?php echo number_format($this->cart->total());?></td>
    </tr>
    <tr>
        <td colspan="6"  align="center">
            <input class="btn btn-danger" type="submit" name="btnSubmit" value="Cập nhật"/> 
            <a href="<?php echo site_url('khach-hang/dat-hang') ?>" class="btn btn-success">Đặt hàng</a>
            <a href="#" class="btn btn-info">Xóa giỏ hàng</a>
            <br />(Nhập Số Lượng Bằng 0 Để Xóa Mặt Hàng)
        </td>
    </tr>
    </tbody>
  </table>
</form>
<?php
}
else
    echo '<h3 align="center" style="margin-top:50px; color: #0000ff">GIỎ HÀNG RỖNG</h3>';
?>