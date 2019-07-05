<html>
    <head>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <meta name="author" content="Jessé Levandovski">
    <meta name="csrf-token" content="{{csrf_token()}}">
        <style>
            body{
                padding: 20px;
            }
            .navbar{
                margin-bottom: 20px;
            }
            strong{
                float: right;
                font-size: 13px;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <div class="card border">
        <div class="card-body">
            <h1>The Star Wars API</h1>
            <hr>
            <h6>Star Wars characters</h6>
            <hr>
            @if($not_found==0)          
            <div class="col-sm-12">
            <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Birth_year</th>
                    <th>Eye_color</th>
                    <th>Gender</th>
                    <th>Hair_color</th>
                    <th>Height</th>
                    <th>Mass</th>
                    <th>Skin_color</th>                 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$result->name}}</td>
                    <td>{{$result->birth_year}}</td>
                    <td>{{$result->eye_color}}</td>
                    <td>{{$result->gender}}</td>
                    <td>{{$result->hair_color}}</td>
                    <td>{{$result->height}}</td>
                    <td>{{$result->mass}}</td>
                    <td>{{$result->skin_color}}</td> 
                </tr>                             
            </tbody>
        </table>        
        @else
            <h3>Not found :(</h3>
        @endif
        <form action="/" method="GET">          
                <div class="form-group">
                    <label for="page_current"></label>
                    <input type="hidden" class="form-control" name="page_current" value="{{$page}}">
                </div>               
                <button name="page_new" value="0" type="submit" class="btn btn-danger btn-sm"><<<<-Previous</button>
                <button name="page_new" value="1" type="submit" class="btn btn-primary btn-sm">Next->>>></button>
        </form>
        <div><strong>Developed by Jessé Levandovski - 2019</strong></div>
        </div>
        </div>    
        </div>
        </div>       
        </div>
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>         
    </body>
</html>
