<!doctype html>
<html lang="ja">

<head>
    <title>Todo List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="reset.css" />
    <style>
    .container {
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    .card{
    background-color: #fff;
    width: 50vw;
    padding: 30px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 10px;
    }


    .todo-title{
      font-weight: bold;
      font-size: 24px;
    }

    .btn-add{
    text-align: left;
    border: 2px solid #dc70fa;
    font-size: 12px;
    color: #dc70fa;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
    }

    .todo-search{
      margin-bottom: 30px;
      justify-content: space-between;
      display: flex;
    }

    .form-control{
    width: 80%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    appearance: none;
    font-size: 14px;
    outline: none;
    }

    .btn-update{
    text-align: left;
    border: 2px solid #fa9770;
    font-size: 12px;
    color: #fa9770;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
    }

    .btn-delete{
    text-align: left;
    border: 2px solid #71fadc;
    font-size: 12px;
    color: #71fadc;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
    }

    table{
    text-align: center;
    width: 100%;
    }

    .table1{
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
    }

    </style>
</head>

<body>
    <div class="container" style="margin-top:50px;">
      <div class="card">
        <p class="todo-title">Todo List<p>
          <div class="todo">
   

        <form action='/todo/create' method="post" class ="todo-search">
            @csrf
            <div class="form-group">
                 <input type="text" name="body" class="form-control" placeholder="todo list" style="max-width:1000px;">
            </div>
            <button type="submit" class="btn-add">追加</button>
        </form>

        

        <table class="table1" style="max-width:700px; margin-top:50px;">
         
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>

            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->created_at }}</td>
                <td>{{ $todo->id }}</td>
                <td>
                
                    <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="post" >
                    @csrf
                     <td>
                    
               <input type="text" value="{{ $todo->body }}" name="body" />
                        <button type="submit" class="btn-update">更新</button>
                       
                    </form>
                </td>
                <td>
                    <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="post">
                      
                     @csrf
                        <button type="submit" class="btn-delete">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>