$.ajax({
    url: 'archivo.txt',
    type: 'GET',
    success: function(res){
        console.log(res);
    },
    error: function(xhr, status, error){
        console.error(xhr, status, error);
    }
});
