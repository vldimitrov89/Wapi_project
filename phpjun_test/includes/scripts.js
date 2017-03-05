
$(document).ready(function(){
        $("#logout").on('click', function() {
            window.location = 'http://localhost/phpjun_test/logout.php';
        });
        
        $("#go_back").on('click', function(){
        	history.back(1);
        });

        $("#add_book").on('click', function(){
            window.location = 'http://localhost/phpjun_test/add_book.php';
        });

        $("#all_books").on('click', function(){
            window.location = 'http://localhost/phpjun_test/books.php';
        });
});

