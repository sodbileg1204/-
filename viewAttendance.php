<?php
include_once("header.php");
$attData = array();
$totDays = 0;
if (isset($_REQUEST['submit'])) {
  $totDays = cal_days_in_month(CAL_GREGORIAN, $_REQUEST['month'], $_REQUEST['year']);
  $attData = $commonObj->getAttendanceData($_REQUEST['day'], $_REQUEST['month'], $_REQUEST['year']);
}
?>


</body>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h4>出席記録</h4>
      <form name="showAtt" method="post">

        <div class="col-sm-4"><label>日:</label>
          <select name="day" class="form-control">
            <?php for ($i = 1; $i <= 31; $i++) { ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-sm-4"><label>月:</label>
          <select name="month" class="form-control">
            <?php for ($i = 1; $i <= 12; $i++) { ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-sm-4"><label>年:</label>
          <select name="year" class="form-control">
            <?php for ($i = date("Y"); $i >= 2010; $i--) { ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-4">
          <p>&nbsp;</p>
          <input type="submit" style="font-weight: bold;" value="検索" name="submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
  <div class="row" style="margin-left: 32%;">
    <div class="col-sm-2" style="margin-top: 10px;">
      <label class="btn btn-warning btn-sm" style="font-weight: bold;">年:<?php echo @$_REQUEST['year']; ?></label>
    </div>
    <div class="col-sm-2" style="margin-top: 10px;">
      <label class="btn btn-success btn-sm" style="font-weight: bold;">月:<?php echo @$_REQUEST['month']; ?></label>
    </div>
    <div class="col-sm-2" style="margin-top: 10px;">
      <label class="btn btn-info btn-sm" style="font-weight: bold;">日: <?php echo @$_REQUEST['day']; ?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12" style="margin-top: 10px;">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">名前</th>
            <th scope="col">日付</th>
            <th scope="col">時間</th>
			     <th scope="col">状態</th>
            <th scope="col">ユーザID:</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach ($attData as $attk => $attv) {
              $punchin = $commonObj->getTimeOfDate($attData[$attk]['punchin']);
              $punchout = $commonObj->getTimeOfDate($attData[$attk]['punchout']);
            ?>
              <th scope="row"><?php echo $attv['user_id']; ?></th>
              <td><?php echo $attv['name']; ?></td>
              <td><?php echo @$_REQUEST['year']; ?>/<?php echo @$_REQUEST['month']; ?>/<?php echo @$_REQUEST['day']; ?></td>
              <?php 
                echo "<td class='success' id='att_$i'>" . $punchin . '-' . $punchout."</td>"; ?>
				
				<?php if($punchin){?>
					<td class='primary'>出席</td>
				<?php }else{?>
					<td class='secondary'>欠席</td>
				<?php }?>
				
              <td><?php echo $attData[$attk]['rfid_uid']; ?></td>
            <?php } ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>

</html>
<script>
  $(document).ready(function() {
    $("td").hover(

      function() {
        var id = "#det_" + this.id;
        $(id).css({
          "display": "block"
        });
      },

      function() {
        var id = "#det_" + this.id;
        $(id).css({
          "display": "none"
        });


        //console.log(id);
        //$(id).css("display","block");

      });

  });
</script>