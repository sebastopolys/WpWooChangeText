
// controls de Admin AJAX form 
document.addEventListener("DOMContentLoaded", function() {
    
    // submit form button
    const submitButton = document.getElementById("chtxt_submit");

    // old text input
    const oldTextInput = document.getElementById('ch_textold');

    // new text input
    const newTextInput = document.getElementById('ch_textnew');

    // Post cats select
    const postCats = document.getElementById('post_cat');

    // Post tags select 
    const postTags = document.getElementById('post_tag');

    // Product cats select
    const prodCats = document.getElementById('prod_cat');

    // Product tag select
    const prodTags = document.getElementById('prod_tag');

    // all IDs text input
    const allIds = document.getElementById('all_ids');

    // Dashboard form show/display inputs
  
  
    // on form Click
    document.change_text_adminform.onclick = function(){

         // hide all
         oldTextInput.style.display = 'none';
         postCats.style.display = 'none';
         postTags.style.display = 'none';
         prodCats.style.display = 'none';
         prodTags.style.display = 'none';
         allIds.style.display = 'none';

        // mode
        var radVal = document.change_text_adminform.wpwoo_function.value;
        // target
        var rodVal = document.change_text_adminform.wpwoo_targetpost.value;
        // content type
        var contVal = document.change_text_adminform.wpwoo_contype.value;

        // Categories
        if(rodVal=='cats' ){
            if(contVal=='wpwoo_post'){
                postCats.style.display = 'block';
            }
            if(contVal=='wpwoo_product'){
                prodCats.style.display = 'block';
            }            
        }
        
        // Tags
        if(rodVal=='tags' ){
            if(contVal=='wpwoo_post'){
                postTags.style.display = 'block';
            }
            if(contVal=='wpwoo_product'){
                prodTags.style.display = 'block';
            }            
        }

 
        // Replace text
        if(radVal=='wpwoo_rep'){
           
            oldTextInput.style.display = 'inline-block';
        }        
        
        // If content typ is pages, then only IDs
        if(rodVal=='ids' || contVal=='wpwoo_page'){
            document.getElementById('tp_ids').checked = true;
            allIds.style.display = 'block';
        }     
        console.log(radVal+' - '+rodVal+' - '+contVal);

    }
 
    
 

    // AJAX start submit dashboard Form
    submitButton.addEventListener("click", startAjax, false);
    function startAjax(e){
        e.preventDefault();  
        const formData = new FormData(document.getElementById("change_text_adminform"));       
        const nonce = document.getElementById("mi_nonce_input").value;
        const xhr = new XMLHttpRequest();
        const url = wpwoo_var.ajaxurl;
        const method = 'POST';
        const action = 'form_post_ajax';        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La solicitud fue exitosa
                    console.log('Respuesta del servidor:', xhr.responseText);
                    // Puedes realizar acciones adicionales con la respuesta aquí
                } else {
                    // La solicitud falló
                    console.error('Error en la solicitud AJAX:', xhr.status);
                }
            }
        };
        formData.append('mi_nonce', nonce); 
        xhr.open(method, url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('action=' + action + '&' + new URLSearchParams(formData)); // Enviar la acción AJAX al servidor        
    }
});
