<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="main">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th> Details </th>
                </tr>
            </thead>
            <tbody id="tblPosts">
            </tbody>
        </table>
    </div>
    <div id="detail">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th> User ID </th>
                </tr>
            </thead>
            <tbody id="tblDetail">
            </tbody>
        </table>
    </div>
    <div id="comment">
        <table>
            <thead>
                <tr>
                    <th>postId</th>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>body</th>
                </tr>
            </thead>
            <tbody id="tblComment">
            </tbody>
        </table>
    </div>
    <button id="btnBack"> back </button>
    <button id="btnComment"> comment </button>

</body>
<script>
    function showDetails(id) {
        $("#main").hide();
        $("#detail").show();
        var url = "https://jsonplaceholder.typicode.com/posts/" + id
        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id=rowdetail>";
                line += "<td>" + data.id + "</td>";
                line += "<td><b>" + data.title + "</b><br/>";
                line += data.body + "</td>";
                line += "<td>" + data.userId + " </td>";
                line += "</tr>";
                $("#tblDetail").append(line);
            })
            .fail((xhr, status, error) => {
            })
    }
    function showcomment(id) {
        $("#main").hide();
        $("#comment").show();
        var url = "https://jsonplaceholder.typicode.com/posts/1/comments"+id+"/comments"
        $.getJSON(url)
            .done((data) => {
                
                var line = "<tr id='comment'";

                line += "<td><b>" + data.id + "</b><br/>"
                line += "<td><b>" + data.name + "</b><br/>"
                line += "<td><b>" + data.email + "</b><br/>"
                line += "<td><b>" + data.body + "</b><br/>"
                line += "<td>" + data.postId + "</td>"
                line += "</tr>";
                $("#tblComment").append(line);

            })
            .fail((xhr, err, status) => {
            })

    }

    function loadPosts() {
        var url = "https://jsonplaceholder.typicode.com/posts";
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>";
                    line += "<td><b>" + item.title + "</b><br/>";
                    line += item.body + "</td>";
                    line += "<td> <button onClick='showDetails(" + item.id + ");' > link </button> </td>";
                    line += "</tr>";
                    $("#tblPosts").append(line);
                });
                $("#main").show();
            })
            .fail((xhr, status, error) => {
            })
    }
    $(() => {
        loadPosts();
        $("#detail").hide();
        $("#btnBack").click(() => {
            $("#main").show();
            $("#detail").hide();
            $("#rowdetail").remove();

        });
        showcomment();
        $("#btnComment").click(() => {
            $("#comment").hide();
            $("#main").show();
            
           
        
            
            
        });
        

    });

</script>

</html>
