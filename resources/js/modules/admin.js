$(document).ready(function(){
    $('#admin_sign_in_form').submit(function(event){
        event.preventDefault();
        $.ajax({
            url:'./do_sign_in.php',
            type:'POST',
            data:$(this).serialize(),
            success:function(result){
                console.log(result);
                if (result == 3) {
                    window.location.href = "/admin/index.php";
                }
            }
        });
    });
    $('#admin_sign_up_form').submit(function(event){
        event.preventDefault();
        $.ajax({
            url:'./do_sign_up.php',
            type:'POST',
            data:$(this).serialize(),
            success:function(result){
                if (result == 1) {
                    alert("username-@ karox e parunakel a-z tarer,0-9 tver,-_ simvolner 2-ic 30 simvol");
                }
                if (result == 2) {
                    alert("Gaxtnabar-@ karox e parunakel a-z tarer,0-9 tver,-_ simvolner 2-ic 30 simvol");
                }
                if (result == 3) {
                    window.location.href = "/admin/index.php";
                }
                if (result == 4) {
                    alert("Gaxtnabar@ chi ham@nknum username-in");
                }
            }
        });
    });
});
