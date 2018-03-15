@extends('layouts.app3')

@section('content')
              <section class="spv5rem">
                <div class="container">
                  <div class="sc_form_wrap">
                    <div class="sc_form sc_form_style_form_1 contact_form_main aligncenter mw470">
                        <h5 class="sc_form_subtitle sc_item_subtitle">¿Es usted mayor de edad?</h5>
                            <div class="sc_form_info">
                          <div class="sc_form_item sc_form_field label_over">
                            <label class="container-radio">NO
                              <input name="grown" value="0" type="radio">
                              <span class="checkmark"></span>
                            </label>
                            <label class="container-radio">SI
                              <input name="grown" value="1" type="radio">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                            </div>
                        <div class="sc_contact_form_button">
                          <div class="sc_form_item sc_form_button">
                            <button onclick="validate()" name="contact_submit" class="sc_form_button">Enviar</button>
                          </div>
                        </div>
                            <div class="result sc_infobox"></div>
                    </div>
                  </div>
                </div>
              </section>
@endsection
<script>
      document.cookie = "birthday=0";
      function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
    }
    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires="+d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function validate(){
      var radios = document.getElementsByName('grown');

      for (var i = 0, length = radios.length; i < length; i++)
      {
       if (radios[i].checked)
       {
        if(radios[i].value==1){
          setCookie('birthday', 1, 2);
          window.location.replace("/");
        }else{
          alert('No es mayor de edad. No puede acceder.');
        }

        // only one radio can be logically checked, don't check the rest
        break;
       }
      }

    }
    

</script>
