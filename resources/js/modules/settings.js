$("#change_name_form").submit(function(event){
    event.preventDefault();
    $.ajax({
        url:'change_name.php',
        type:'POST',
        data:$(this).serialize(),
        success:function(result){
            if (result == 1) {
                alert("Anun@ karox e parunakel a-z A-Z tarer,0-9 tver, -,_ ev prabel, 2-30 simvol");
            }
            if (result == 2) {
                location.reload();
            }
        }
    });
});



