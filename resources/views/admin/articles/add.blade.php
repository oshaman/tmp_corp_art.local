@include('admin.articles.nav')
<h2>Додати статтю</h2>
{!! Form::open(['url'=>route('create_article'), 'method'=>'POST', 'class'=>'form-horizontal', 'files'=>true]) !!}
<div class="">
    {{ Form::label('title', 'Заголовок статті') }}
    <div>
        {!! Form::text('title', old('title') ? : '' , ['placeholder'=>'Встановлення новорічної ялинки...', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
    </div>
</div>
<div class="">
    {{ Form::label('alias', 'ЧПУ статті') }}
    <div>
        {!! Form::text('alias', old('alias') ? : '',
         ['placeholder'=>'vstanovlennya-novorichnoyi-yalinki', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
    </div>
</div>
<div class="">
    {{ Form::label('category_id', 'Категорія') }}
    <div>
        {!! Form::select('category_id', $cats ?? [],
            old('category_id') ? : '' , [ 'class'=>'form-control', 'placeholder'=>'Категорія'])
        !!}
    </div>
</div>
<div class="">
    {{ Form::label('img', 'Параметри зображення') }}
    <div class="">
        <div class="col-lg-6">
            {!! Form::text('imgalt', old('imgalt') ? : '' , ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::text('imgtitle', old('imgtitle') ? : '' , ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
        </div>
    </div>
    {{ Form::label('img', 'Основне зображення') }}
    <div>
        {!! Form::file('img', ['accept'=>'image/*', 'id'=>'img', 'class'=>'form-control']) !!}
    </div>
</div>
<div class="">
    {{ Form::label('tags', 'Теги') }}
    @if(!empty($tags))
        <div>
            <table class="table tags">
                @foreach($tags as $id=>$tag)
                    <td>
                        <input name="tags[]" type="checkbox"
                               @if(!empty(old('tags')))
                               @foreach(old('tags') as $val)
                               @if($val == $id)
                               checked
                               @endif
                               @endforeach
                               @endif
                               value="{{ $id }}"> {{ $tag }}
                    </td>
                @endforeach
            </table>
        </div>
    @endif
</div>
<hr>
<div class="row">
    <!-- Approved -->
    <div class="col-lg-6">
        <label>
            <input type="checkbox" {{ old('confirmed') ? 'checked' : ''}} value="1" name="confirmed">
            Опублікувати
        </label>
    </div>
    <div class="col-lg-6">
        <h4>{!! Form::label('outputtime', 'Дата публікації') !!}</h4>
        <div class="input-prepend"><span class="add-on"><i class="icon-time"></i></span>
            <input type="text" name="outputtime" id="outputtime" value="{{ old('outputtime') ? : date('Y-m-d H:i') }}">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <textarea name="content" class="form-control editor">{!! old('content') ? : '' !!}</textarea>
</div>
<div class="row">
    <hr>
    {!! Form::button('Додати', ['class' => 'btn btn-large btn-primary','type'=>'submit']) !!}
</div>
{!! Form::close() !!}
