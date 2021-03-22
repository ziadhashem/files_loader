<?php
include_once(__DIR__.'/header.php');
?>
    <script>
        $('#breadcrumb').append('<li class="breadcrumb-item active" aria-current="page">Upload File</li>');
    </script>
    <div class="grid-panel">
        <div class="well well-sm">
            <div class="row" id="form-header">
                <span class="glyphicon glyphicon-edit"></span>
                <span class="IM_Fell_French_Canon_SC">Upload New File</span>
                <hr>
            </div>
            <div class="row">
                <form>
                    <div class="col-md-5">
                        <div class="form-group">
                            <select class="form-control col-md-9" id="table_name_select" required>
                                <option value="">Please Select Table ...</option>
                                <option value="ManyChat">ManyChat</option>
                                <option value="Walmart_orders">Walmart_orders</option>
                                <option value="Shopify_orders">Shopify_orders</option>
                                <option value="BULLFROG_DATA">BULLFROG_DATA</option>
                                <option value="Amazon_orders">Amazon_orders</option>
                                <option value="Amazon_orders_raw">Amazon_orders_raw</option>
                                <option value="Instant_data">Instant_data</option>
                            </select>
                        </div>
                        <div class="file-upload">
                            <div class="file-select">
                                <div class="file-select-button" id="fileName">Choose File</div>
                                <div class="file-select-name" id="noFile">No file chosen...</div>
                                <input type="file" name="file_loaded" id="file_loaded" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <select class="form-control col-md-9" id="sheet_name_select">
                                <option value="">Please select a sheet after select file...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3" for="line_number">Read until line :</label>
                            <input class="form-inline form-control-static col-md-9" type="number" id="line_number" name="line_number" placeholder="line number ... (this field is optional)">
                        </div>
                        <br>
                        <div class="form-group">
                            <i  id="loading_sign" class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        </div>
                        <div class="form-group">
                            <button id="post_file_btn" type="button" class="col-md-12 btn btn-primary">Upload File</button>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <a href="#" id="link_download_status_report">To download status report click here</a>
                        <div class="form-group">
                            <textarea  class="form-control" rows="16" id="notes" placeholder="Here it appears status report ..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="snackbar">
        <div class="row">
            <span class="col-md-1" id="icon_snackbar"></span>
            <div class="col-md-11" id="content_snackbar"></div>
        </div>
    </div>
<?php
include_once(__DIR__.'/footer.php');
?>
    <script>
       $(`#link_download_status_report`).hide();
       prepareChooseFile();
       $("#file_loaded").change(function (){
           getSheetsNames();
       });


       function getMsg(status,msg) {
           let x = document.getElementById("snackbar");
           let icon = getIcon(status);
           $(`#icon_snackbar`).html(icon);
           $('#content_snackbar').text(msg);
           x.className = "show";
           setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
        }
        $(`#loading_sign`).hide();
        $("#post_file_btn").click(function (){
            $(`#link_download_status_report`).hide();
            let table_name = $(`#table_name_select`).val();
            let fake_path = $("#file_loaded").val();
            let line_number = $(`#line_number`).val();
            let sheet_name_select = $("#sheet_name_select").val();
            var FileLoaded= $("#file_loaded")[0].files[0];
            if(fake_path != '' && table_name != '') {
                let formData = new FormData();
                formData.append("FileLoaded", FileLoaded);
                formData.append("table_name", table_name);
                formData.append("sheet_name_select", sheet_name_select);
                formData.append("read_until_line_number", line_number);
                $.ajax({
                    type: "post",
                    url: '../src/ProcessingInsert.php',
                    data: formData,
                    async: true,
                    enctype: 'multipart/form-data',
                    processData: false,  // Important!
                    contentType: false,//'application/json',
                    cache: false,
                    beforeSend: function (xhr) {
                        $(`#loading_sign`).show();
                    },
                    success: function (result) {
                        let data = JSON.parse(result);
                        $(`#loading_sign`).hide();
                        $(`#notes`).val('');
                        if(data.is_error == false) {
                            let content_notes = '- The Status of upload process :  (There is '+ data.exceptions.length +' exceptions ).\r\n';
                            content_notes += ' - Details : \r\n';
                            getMsg(data.msg_type, data.msg);
                            if(data.there_is_exceptions){
                                $.each(data.exceptions,function(key,value){
                                   content_notes += value ;
                                   content_notes += '\r\n__________________________________\r\n';
                                });
                                $(`#notes`).val(content_notes);
                                let filename="status report.txt";
                                // $(`#link_download_status_report`).attr(`onclick`,`download(filename,content_notes)`);
                                $(`#link_download_status_report`).show();
                                $(`#link_download_status_report`).click(function (e){
                                    e.preventDefault();
                                    download(filename,content_notes);
                                    $(`#link_download_status_report`).hide();
                                });


                            }
                        }
                        else {
                            getMsg('e',data.msg);
                        }
                    }
                });
            }
            else if(table_name == ''){
                getMsg('w', 'Please Select Table Name');
            }
            else if(fake_path == ''){
                getMsg('w', 'Please Select File');
            }
        });

       function getIcon(status){
           let icon = '';
           if(status.toUpperCase() =="S")
               icon = '<i style="color: #1e7e34;" class="fa fa-check-circle"></i>';
           else if(status.toUpperCase() =='E')
               icon = '<i style="color: #ed969e;" class="fa fa-times-circle"></i>';
           else if(status.toUpperCase() =='W')
               icon = '<i style="color:darkorange;" class="fa fa-exclamation-triangle"></i>';
           return icon;
       }

       function prepareChooseFile(){
           $('#file_loaded').bind('change', function () {
               var filename = $("#file_loaded").val();
               if (/^\s*$/.test(filename)) {
                   $(".file-upload").removeClass('active');
                   $("#noFile").text("No file chosen...");
               }
               else {
                   $(".file-upload").addClass('active');
                   $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
               }
           });
       }

       function getSheetsNames(){
           var FileLoaded= $("#file_loaded")[0].files[0];
           var formData = new FormData();
           formData.append("FileLoaded", FileLoaded);
           $.ajax({
               type:"post",
               url :'../src/getSheetsNames.php',
               data:formData,
               async: true,
               enctype: 'multipart/form-data',
               processData: false,  // Important!
               contentType: false,
               cache:false,
               beforeSend: function (xhr){
                   $(`#loading_sign`).show();
               },
               success:function(result){
                   $(`#loading_sign`).hide();
                  console.log(result);
                  let data = JSON.parse(result);
                  if(data.is_error == false){
                      $("#sheet_name_select").children().remove();
                      $("#sheet_name_select").append(`<option value="">Please Select Sheet ...</option>`);
                      console.log(data.sheets_names);
                      $.each(data.sheets_names,function (key,value){
                          $("#sheet_name_select").append(`<option value="${value}">${value}</option>`);
                      });
                  }
               }
           });
       }


       function download(filename, text) {
           var element = document.createElement('a');
           element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
           element.setAttribute('download', filename);
           element.style.display = 'none';
           document.body.appendChild(element);
           element.click();
           document.body.removeChild(element);
       }

    </script>

