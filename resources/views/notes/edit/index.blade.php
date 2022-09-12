<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
    <title>Modify Note - Notey</title>
</head>
<body>
    <section class="section">
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <p class="title mx-2">Notey</p>
              </a>
            </div>
          
              <div class="navbar-end">
                <div class="navbar-item">
                  <div class="buttons">
                    <a class="button is-rounded is-light"
                    href={{ route('notes.home') }}>
                      Home
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </nav>

      <form action={{ route('notes.update',['note' => $note->id]) }} method="POST">
        @csrf
        @method('PUT')
          <div class="field">
            <label class="label">Title</label>
            <div class="control">
              <input class="input" 
                    name='title' 
                    type="text" 
                    placeholder="Enter title"
                    value="{{ $note->title }}">
            </div>
            @error('title')
              <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>

          @php
              $user_color = $note->props['color'];
              $def_colors = ['Blue','Green','Red','Yellow'];
              $colors_to_use = array();

              //Lets push the user selected color first, to let it stand out
              array_push($colors_to_use, $user_color);

              foreach ($def_colors as $color) {
                if(!in_array($color, $colors_to_use)){
                    array_push($colors_to_use, $color);
                }
              }
          @endphp
          
          <div class="field">
            <label class="label">Note Color</label>
            <div class="control">
              <div class="select">
                <select name='color'>
                    @foreach ($def_colors as $color)
                        <option 
                        @class([
                        'has-background-info' => ($color === 'Blue'),
                        'has-background-success' => ($color === 'Green'),
                        'has-background-danger' => ($color === 'Red'),
                        'has-background-warning' => ($color === 'Yellow')
                        ])>{{ $color }}</option>
                    @endforeach
                </select>
              </div>
              <p class="help is-danger">{{ old('color') }}</p>
            </div>
          </div>
          <div class="field">
            <label class="label">Content</label>
            <div class="control">
              <textarea class="textarea" 
                    name='content' 
                    placeholder="Enter your notes here">{{ $note->content }}</textarea>
            </div>
            @error('content')
              <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
          
          <div class="field is-grouped">
            <div class="control">
              <input type='submit' class="button is-link is-rounded is-outlined is-focused" value="Update"/>
            </div>
          </div>
        </form>
</body>
</html>