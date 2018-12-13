;
((d,c,$) => {
  c('Hola desde form admin');
  c(contact_form);
  d.addEventListener('click', e => {
    if(e.target.matches('.u-delete')){
      e.preventDefault()
      // c(e.target.dataset.contactId);
      let id = e.target.dataset.contactId;
      let confirmDelete = confirm(`¿Estás segura de eliminar el contacto con el ID ${id}?`);

      if(confirmDelete){
        $.ajax({
          type:'post',
          data: {
            'id': id,
            'action': 'quintil_contact_form_delete'
          },
          url: contact_form.ajax_url,
          success: data => {
            c(data)
            let res = JSON.parse(data);
            if(!res.err){
              let selectorId = '[data-contact-id="' + id + '"]';
              d.querySelector(selectorId).parentElement.parentElement.remove();
            }
          }
        })
      }else{
        return false;
      }

    }
  });
})(document, console.log,jQuery.noConflict());
