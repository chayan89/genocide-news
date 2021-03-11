<!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>  Genocide </a></li>
                    <li class="breadcrumb-item active">Dashboard  </li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
 <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card w_data_1">
                       <div class="body">
                           <a href="<?=base_url('admin/nrc/news-list')?>">  <div class="w_icon indigo"><i class="zmdi zmdi-account"></i></div>
                            <h3 class="mt-3"> NRC </h3>
                            
                       </div>  </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card w_data_1">
                       <div class="body">
                           <a href="#">  <div class="w_icon indigo"><i class="zmdi zmdi-time"></i></div>
                            <h3 class="mt-3"> Timeline </h3>
                            
                       </div>  </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card w_data_1">
                       <div class="body">
                           <a href="#">  <div class="w_icon indigo"><i class="zmdi zmdi-collection-text"></i></div>
                            <h3 class="mt-3"> Articles </h3>
                            
                       </div>  </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card w_data_1">
                       <div class="body">
                           <a href="#">  <div class="w_icon indigo"><i class="zmdi zmdi-collection-video"></i></div>
                            <h3 class="mt-3"> Videos </h3>
                            
                       </div>  </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card w_data_1">
                        <div class="body">
                           <a href="#">  <div class="w_icon indigo"><i class="zmdi zmdi-balance"></i></div>
                            <h3 class="mt-3"> Legal </h3>
                            
                       </div>  </a>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card w_data_1">
                        <div class="body">
                           <a href="#">  <div class="w_icon indigo"><i class="zmdi zmdi-thumb-down"></i></div>
                            <h3 class="mt-3"> Hate </h3>
                            
                       </div>  </a>
                    </div>
                </div>
            </div>
  <div class="row clearfix">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>ToDo</strong> List</h2>
                        </div>
                        <div class="body todo_list">
                            <div class="input-group mb-4">
                                <input type="text" id="todo-text" class="form-control" placeholder="Type your task here...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Add Todo</button>
                                </div>
                            </div>                            
                            <ul class="list-group" id="todo-list">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Wait....
                                   <span class="badge badge-primary badge-pill">x</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card" style="height:30px; margin-bottom:5px;">
                        <h2><strong>Calendar</h2> </div>
                        <div class="icalendar">
                            <div class="icalendar__month">
                                <div class="icalendar__prev" onclick="moveDate('prev')">
                                    <span>&#10094</span>
                                </div>
                                <div class="icalendar__current-date">
                                    <h2 id="icalendarMonth"></h2>
                                    <div>
                                        <div id="icalendarDateStr"></div>
                                    </div>
                        
                                </div>
                                <div class="icalendar__next" onclick="moveDate('next')">
                                    <span>&#10095</span>
                                </div>
                            </div>
                            <div class="icalendar__week-days">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="icalendar__days"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?=base_url('public/admin/')?>jquery.simple-calendar.js"></script>

<script>
    var todos = <?= $todos ?>;

    $(document).ready(function(){
        makeTodoList();

        $('#button-addon2').on('click', function(){
            if($('#todo-text').val() == ""){
                swalAlert('Todo content is required', 'warning');
                return false;
            }
            $.ajax({
                type: "POST",
                url: base_url + "dashboard/todoSave",
                data: {
                    content: $('#todo-text').val()
                },
                dataType: 'JSON',
                beforeSend: function() {
                },
                success: function(response) {  
                    if(response.status.error_code == 0){
                        $('#todo-text').val('');
                        todos = response.result.data;
                        makeTodoList();
                        swalAlert(response.status.message, 'success');
                    }else{
                        swalAlert(response.status.message, 'warning');
                    }
                },
                error: function(response){
                    swalAlert('Something wrong, try again', 'warning');
                } 
            });
        })

        //remove todos
        $(document).on('click', '.remove-todo', function(){
            console.log('test');
            $.ajax({
                type: "POST",
                url: base_url + "dashboard/todoRemove",
                data: {
                    id: $(this).data('id')
                },
                dataType: 'JSON',
                beforeSend: function() {
                },
                success: function(response) {  
                    if(response.status.error_code == 0){
                        todos = response.result.data;
                        makeTodoList();
                        swalAlert(response.status.message, 'success');
                    }else{
                        swalAlert(response.status.message, 'warning');
                    }
                },
                error: function(response){
                    swalAlert('Something wrong, try again', 'warning');
                } 
            });
        })
    })
    function makeTodoList(){
        $('#todo-list').html('');
        if(todos.length <= 0){
            $('#todo-list').append('<li id="list-0" class="list-group-item d-flex justify-content-between align-items-center"> Todos not added yet.</li>');
        }
        $('list-0').remove();
        todos.forEach(function(val, key){
            $('#todo-list').append('<li id="list-'+ val.todo_id +'" class="list-group-item d-flex justify-content-between align-items-center"> '+ val.content +' <span class="badge badge-primary badge-pill remove-todo" data-id="'+ val.todo_id +'">x</span></li>');
        })
    }
</script>