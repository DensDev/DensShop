<!-- quick email widget -->
<?php foreach($inbox as $inbox) { ?>
    <div class="form-group">
      <input type="hidden" class="form-control" name="inbox_id" value="<?php echo $inbox->inbox_id ?>">
      <input type="email" class="form-control" name="inbox_email" placeholder="Email to:" value="<?php echo $inbox->inbox_email ?>">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="inbox_subject" placeholder="Subject" value="Re: <?php echo $inbox->inbox_subject ?>">
    </div>
    <div>
      <textarea class="textarea" placeholder="Message"
                style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="inbox_pesan"></textarea>
    </div>
<div class="box-footer clearfix">
  <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
    <i class="fa fa-arrow-circle-right"></i></button>
</div>
<?php } ?>
