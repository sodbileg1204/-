<?php
include_once("headertest.php");
$attData = array();
$totDays = 0;
if (isset($_REQUEST['submit'])) {
  $totDays = cal_days_in_month(CAL_GREGORIAN, $_REQUEST['month'], $_REQUEST['year']);
  $attData = $commonObj->getAttendanceData($_REQUEST['month'], $_REQUEST['year']);
  //print_r($attData);
  //print_r(date("d",strtotime($attData[0]['punch_time'])));
}
?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h4>出席</h4>
      <form name="showAtt" method="post">
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
          <input type="submit" value="検索" name="submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
  <div class="row" style="margin-left: 37%;">
    <div class="col-sm-2" style="margin-top: 10px; margin-bottom: 10px;">
      <label class="btn btn-success btn-sm">月:<?php echo @$_REQUEST['month']; ?></label>
    </div>
    <div class="col-sm-2" style="margin-top: 10px; margin-bottom: 10px;"><label class="btn btn-info btn-sm">年: <?php echo @$_REQUEST['year']; ?></label></div>
  </div>
  <div class="row">
    <div class="col-sm-12" style="overflow: scroll;">
      <?php if ($totDays > 0) { ?>
        <table class="table table-striped">
          <tr>
            <th>
              名前
            </th>
            <?php for ($i = 1; $i <= $totDays; $i++) { ?>
              <th>
                <?php echo $i; ?>
              </th>
            <?php } ?>

            <?php foreach ($attData as $attk => $attv) {
              $punchin = $commonObj->getTimeOfDate($attData[$attk]['punchin']);
              $punchout = $commonObj->getTimeOfDate($attData[$attk]['punchout']);
            ?>
          <tr>
            <th class="danger">
              <?php echo $attv['name']; ?>
            </th>
            <?php for ($i = 1; $i <= $totDays; $i++) { ?>

              <?php if ($commonObj->getDayOfDate($attData[$attk]['punch_time']) == $i) {

                  echo "<td class='success' id='att_$i'>" . $punchin . '-' . $punchout; ?>
                <table class="table table-responsive" style="display: none; position:relative;min-width:100px;max-width:200px; margin-top: -40px;" id="<?php echo "det_att_" . $i; ?>">
                  <tr>
                    <td>合計時間:</td>
                    <td><?php echo $commonObj->getHoursBetweenDates($attData[$attk]['punchin'], $attData[$attk]['punchout']); ?>
                    </td>
                  </tr>
                  <tr>
                    <td>UID:</td>
                    <td><?php echo $attData[$attk]['rfid_uid']; ?></td>
                  </tr>
                </table>
              <?php
                } else {
                  echo "<td class='info'>0";
                } ?>
              </td>
            <?php } ?>
          </tr>
        <?php } ?>
        </tr>
        </table>
      <?php } ?>
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