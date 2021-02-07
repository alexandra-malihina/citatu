
$(document).ready(function(){
   $("#content").load('/data');
});

let addTags=[];

$('#add').click(function(){
   displayModal('content',10,false);
   displayModal('modal-window');
   
});

$('#fade, span.modal_close').click(function(){
   displayModal('modal-window',10,false);
   displayModal('content');
   $('.tag').each(function(){
      $(this).removeClass('active');
   });
   addTags=[];
});

$('.tag').click(function(){   
   let idV=$(this).data('id');
   if($(this).hasClass('active'))
   {
      $(this).removeClass('active'); 
      var i=addTags.indexOf(idV) ;
      console.log(i);
      addTags.splice(i,1);    
   }      
   else {
      if(addTags.length<3){
         $(this).addClass('active');
         console.log($(this).data('id'));         
         addTags.push(idV);         
      }
   }
   switch(addTags.length){
      case 0:$("#message_modal").text("Добавьте теги!").css("color","red");break;
      case 3:$("#message_modal").text("Максимальное количество тегов").css("color","red"); break;
      default:$("#message_modal").text("От 1 до 3").css("color","inherit");
   }
   
   $("#tags_input").val(addTags.join(','));
      console.log(addTags);
});


$('input, textarea').focus(function(){
   $(this).removeClass('ahtung');
});


$("#author").on('input', function(){
   console.log($(this).val());
   var str=$(this).val();
   if(str.length<3){
      $("#error_author").text("Введите более 3 символов");
   }
   else
   {
      if(str.length>140)
      $(this).val(str.slice(0,140));
      $("#error_author").text("");
   }
});


$("#text").on('input', function(){
   console.log($(this).val());
   var str=$(this).val();
   if(str.length<10){
      $("#error_text").text("Введите более 10 символов");
   }
   else
   {
      if(str.length>255)
      $(this).val(str.slice(0,255));
      $("#error_text").text("");
   }
});


$('#add_citat').click(function(){
   var author=$('#author').val();
   var text=$('#text').val();

   if(!author || author.length<3)
   {
      $('#author').attr('placeholder',"Заполни меня!").addClass('ahtung');
      return;
   }
   if(!text || text.length<5)
   {
      $('#text').attr('placeholder',"Заполни меня!").addClass('ahtung');
      return;
   }
   if(addTags.length==0){
      $('#tags_label').css("color","red");
      return;
   }
   var tags=addTags.join(',');
   $.ajax({
      url:"/citata",
      type:"POST",
      headers: {

         'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
         
         },
      data:{'author':author, 'text':text, 'tags':tags},
      success:function(data){
         
              }
   });
   $("#content").load('/data');
   displayModal('modal-window',10,false);
   displayModal('content');
});

function displayModal( id,duration=500,mode=true ){
   // 
   if(mode)
      $('#'+id).fadeIn(duration, "linear");
      else
      $('#'+id).fadeOut(duration, "linear");
   
}
