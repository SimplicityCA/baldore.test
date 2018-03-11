@extends('layouts.app3')

@section('content')
              <section class="spv5rem">
                <div class="container">
                  <div class="sc_form_wrap">
                    <div class="sc_form sc_form_style_form_1 contact_form_main aligncenter mw470">
                        <h5 class="sc_form_subtitle sc_item_subtitle">Escoge tu Fecha de Nacimiento?</h5>
                            <div class="sc_form_info">
                          <div class="sc_form_item sc_form_field label_over">
                            <label class="required" for="sc_form_username">Nombre</label>
                                    <input type="number" name="day" id="day" placeholder="DD">
                                </div>
                                <div class="sc_form_item sc_form_field label_over">
                            <label class="required" for="sc_form_email">E-mail</label>
                                    <input type="number" name="month" id="month" placeholder="MM">
                                </div>
                                <div class="sc_form_item sc_form_field label_over">
                            <label class="required" for="sc_form_subj">Asunto</label>
                                    <input type="number" name="year" id="year" placeholder="AAAA">
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
    function isDate18orMoreYearsOld(day, month, year) {
      console.log(year+18);
      console.log(Date(year+18, month, day));
      return new Date(year+18, month, day) <= new Date();
    }
    function validate(){
      var day = parseInt(document.getElementById("day").value);
      var month = parseInt(document.getElementById("month").value);
      var year = parseInt(document.getElementById("year").value);
      if(isDate18orMoreYearsOld(day, month, year)){
        setCookie('birthday', 1, 2);
        window.location.replace("/");
      }else{
        alert('No es mayor de edad.');
      }
    }
    

</script>
