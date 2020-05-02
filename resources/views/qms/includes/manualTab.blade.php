<div class="row">
  <div class="col-md-12">
    <div style=" padding-top: 30px;">
      @if(!$manuals->isEmpty())
        @foreach ($manuals as $key=> $manual)
        <div style="background-color:{{ $key%2==0 ? '#f1f1f1' : '#ffffff' }};color:#000000;padding:20px;">
          <h2>{{$manual->manual_title}}</h2>
          <div>
            {!! $manual->manual_text !!}
          </div>
        </div>
        @endforeach

      @else
       <div class="nav-tabs-custom">
          No record available!!
      </div>
      @endif
    </div>
  </div>
</div>