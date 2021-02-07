
@if(count($data)>0)

        <?php 
            $tags_ex=json_decode($tags_array);
        ?>
        {{$data->links()}}
        @foreach ($data as $key=>$element)
        <div class="bodyCard">
            <div class="cardText">{{$element->text}}</div>
            <div class="cardAuthor">{{$element->author}}</div>
            <small class="cardDate">{{ \Carbon\Carbon::createFromTimestamp(strtotime($element->created_at))->format('Y-m-d')}}</small>
            <div class="cardTags">
                
                @foreach ($tags_ex[$key] as $tag_name)
                <div class="tag_name">
                {{$tag_name->name}}
                </div>
                    
                @endforeach
                
            </div>
        </div>

        

 
        @endforeach
        {{$data->links()}}
       
        
    @else
    Увы, но цитат нет... Может, напишешь парочку?
    @endif
<script>
    $(".new_page").click(function(){
   $("#content").load('/data'+$(this).data('url'));
    });
    </script>