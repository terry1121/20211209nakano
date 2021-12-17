<!doctype html>
<html lang="ja">

<head>
    <title>Todo List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="reset.css" />
    <style>

  .flex {
      display: flex;
    }

    .between {
      justify-content: space-between;
    }

    .tlt-1 {
      margin-bottom: 15px;
    }

    .tlt-2 {
      margin-bottom: 30px;
    }

    .container {
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    .card {
      background-color: #fff;
      width: 50vw;
      padding: 30px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
    }

    .title {
      font-weight: bold;
      font-size: 24px;
    }

    .input-add {
      width: 80%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none;
    }

    table {
      text-align: center;
      width: 100%
    }

    tr {
      height: 50px;
    }

    .update {
      width: 90%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none;
    }

    .button-add {
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

    .button-add:hover {
      background-color: #dc70fa;
      border-color: #dc70fa;
      color: #fff;
    }

    .button-update {
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

    .button-update:hover {
      background-color: #fa9770;
      border-color: #fa9770;
      color: #fff;
    }

    .button-delete {
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

    .button-delete:hover {
      background-color: #71fadc;
      border-color: #71fadc;
      color: #fff;
    }

    </style>
</head>

<body>
    <div class="container">
      <div class="card">
        <p class="title tlt-1">Todo List<p>
          <div class="todo">
   
        <form action='/todo/create' method="post" class ="flex between tlt-2">
            @csrf
            <div class="form-group">
                 <input type="text" name="body" class="input-add" placeholder="todo list" style="max-width:1000px;">
            </div>
            <button type="submit" class="button-add">追加</button>
        </form>

        

        <table>
          <tbody><tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>

            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->created_at }}</td>
                <input type="hidden" name="id" value="{{ $todo->id }}">
                <td>
                    <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="post" >
                    @csrf
                        <input type="text"  class="update" value="{{ $todo->body }}" name="body" />
                        <td><button type="submit" class="button-update">更新</button></td>
                    </form>
                </td>
                
                <td>
                    <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="post">
                     @csrf
                        <button type="submit" class="button-delete">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
     </div>
</body>

</html>