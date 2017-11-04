
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->css('../bootstrap-slider/slider',['block' => 'css']); ?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Rate Your Day</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="callout callout-warning">
                        <h4>How it Works !</h4>

                        <p>Rate the Company based upon the criteria that have been mentioned below.</p>
                        <p>After you submit it, the overall average of the ratings will be calculated and submitted to the Management Team.</p>
                        <p>A note of advice is expected.</p>
                    </div>
                    <div class="row margin">
                        <form role="form" method="post">
                        <div class="box-body">
                            <div class="col-sm-6">
                                <p><strong>Did you enjoy your day at work ?</strong></p>
                                <input type="text" value="" name="1" class="slider form-control" data-slider-min="0" data-slider-max="10"
                                       data-slider-step="0.1" data-slider-value="[0,10]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
                                <p><strong>Did you enjoyed working on your assignment ?</strong></p>
                                <input type="text" value="" name="2" class="slider form-control" data-slider-min="0" data-slider-max="10"
                                       data-slider-step="0.1" data-slider-value="[0,10]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="green">
                                <p><strong>Rate your day based upon your level of comfort while interacting with your senior incharge ?</strong></p>
                                <input type="text" value="" name="3" class="slider form-control" data-slider-min="0" data-slider-max="10"
                                       data-slider-step="0.1" data-slider-value="[0,10]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="yellow">
                                <p><strong>Rate your level of happiness from your working hours ?</strong></p>
                                <input type="text" value="" name="4" class="slider form-control" data-slider-min="0" data-slider-max="10"
                                       data-slider-step="0.1" data-slider-value="[0,10]" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
                            </div>
                            <div class="col-sm-6 text-center">
                                <p><strong>Rate your level of happiness at our company ?</strong></p>
                                <input type="text" value="" name="5" class="slider form-control" data-slider-min="0" data-slider-max="10"
                                       data-slider-step="0.1" data-slider-value="[0,10]" data-slider-orientation="vertical"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue">
                            </div>
                            <div class="col-sm-12">
                                <hr>
                                <div class="form-group input textarea required">
                                    <label for="note-of-advice">Note Of Advice</label>
                                    <textarea name="note_of_advice" class="form-control" required="required" id="note-of-advice" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <br>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->



<?php $this->start('scriptBottom'); ?>
<?php echo $this->Html->script('../bootstrap-slider/bootstrap-slider'); ?>
<script>
    $(document).ready(function () {
        /* BOOTSTRAP SLIDER */
        $('.slider').slider()
    })
//    $(function () {
//        /* BOOTSTRAP SLIDER */
//        $('.slider').slider()
//    })
</script>
<?php $this->end(); ?>
