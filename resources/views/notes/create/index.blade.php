<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
    <title>Create Note - Notey</title>
</head>
<body>
    <section class="section">
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <p class="title mx-2">ColorNote</p>
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

      <form action={{ route('notes.store') }} method="POST">
        @csrf
          <div class="field">
            <label class="label">Title</label>
            <div class="control">
              <input class="input" name='title' value="{{ old('title') }}" type="text" placeholder="Enter title">
            </div>
            @error('title')
              <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
          
          <div class="field">
            <label class="label">Note Color</label>
            <div class="control">
              <div class="select">
                <select name='color'>
                  <option class="has-background-info">Blue</option>
                  <option class="has-background-success">Green</option>
                  <option class="has-background-danger">Red</option>
                  <option class="has-background-warning">Yellow</option>
                </select>
              </div>
            </div>
          </div>
          <div class="field">
            <label class="label">Content</label>
            <div class="control">
              <textarea class="textarea" name='content' placeholder="Enter your notes here">{{ old('content') }}</textarea>
            </div>
            @error('content')
              <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
          
          <div class="field is-grouped">
            <div class="control">
              <input type='submit' class="button is-link is-rounded is-outlined is-focused" value="Create"/>
            </div>
          </div>
        </form>
</body>
</html>