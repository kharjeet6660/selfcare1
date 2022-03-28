<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>
<?php $this->load->view('includes/top-navbar'); ?>
<div class="page-wrapper">
    <div class="page-content-tab">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class='mt-5 md-5'>Upload Payroll Slip</h2>
                </div>
                <div class="col-sm-6">
                    <div class='card'>
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">                      
                                    <h4 class="card-title">Import Excelsheet Data</h4>
                                </div>                                  
                            </div>
                            <div class='card-body'>

                                <div class="container-fluid  p-3">
                                    
                                    <div class="row">
                                        <!-- Import link -->
                                        <div class="col-md-12 head">
                                            <div class="float-right">
                                                <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="fa fa-plus"></i> Import</a>
                                            </div>
                                        </div>

                                        <!-- File upload form -->
                                        <div class="col-md-12 py-4" id="importFrm" style="display: none;">
                                            <?php echo form_open(base_url('admin/excel_import_data/import'),'id="import_form" method="POST" enctype="multipart/form-data"') ?>
                                            <div class="col-sm-12 pb-4">
                                                <label for="file">Choose Excel File Only</label>
                                                <input type="file" name="file" id="file" class="form-control" required accept=".xls, .xlsx">
                                            </div>
                                            <div class="col-sm-12 pb-4">
                                                <label for="Payroll_month">Payroll Month</label>
                                                <input class="form-control" type="date" id="start" name="Payroll_month"
                                                min="2022-01-00" required >
                                            </div>
                                            <input type="submit" name="import" class="btn btn-primary" name="importSubmit" value="SUBMIT">
                                        </form>
                                    </div>
                                    <script>
                                        function formToggle(ID){
                                            var element = document.getElementById(ID);
                                            if(element.style.display === "none"){
                                                element.style.display = "block";
                                            }else{
                                                element.style.display = "none";
                                            }
                                        }
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('includes/footer'); ?>
    </div>
