
    $('#search').on('keyup',function(){
    // const url = new URL("/searchStudent");
    // let url = new URL("/",'searchStudent');
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : "../searchStudent/1",
    // url : '{{URL::to('search')}}',
    data:{'key':$value},
    success:function(data){
    $('#tbody').html(data);
    }
    });
    })
