//Custom Javascript Here
$(document).ready(function(){
    $('#VAT').hide();
    $('#Companyname').hide();
    $('#other_checkbox').change(function(){ // This is used to fadeIn&FadeOut the text filed in the feedback-form
        if(this.checked){
            $('#VAT').fadeIn('slow');
            $('#Companyname').fadeIn('slow');
        }
        else{
            $('#VAT').fadeOut('slow');
            $('#Companyname').fadeOut('slow');
}
    });
});