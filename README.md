sportive
========

Coding Standard
===============

Pada dasarnya standar code diadopsi dari [PEP-008](http://www.python.org/dev/peps/pep-0008/).
Dengan sedikit penyesuaian untuk bahasa PHP.

Naming conventions
------------------

* Variable, lower-case separated with underscore (_)

```php
// salah
$Myname = "name";

// please no camel case, for make it different with method name
$myName = "name";

// benar
$my_name = "name";

// constant variable, upper case
$MY_NAME = "name";
```

* Method, camel-case kecuali untuk method controller

```php
function healTheWorld(){
    print "hello";
}
```

Untuk subfunction gunakan under score untuk awalan nama method.

```php
function generateID(){
    function _lookUP(){
        // do something
    }
    
    $id = _lookUP();
    return $id;
}
```

* Single quote or double quote?
Gunakan double quote agar konsisten.

* Indentasi
Gunakan 4 space, jangan gunakan tab.
Jika memungkinkan, biasakan untuk menulis code dengan maksimal 80 kolom, untuk
memudahkan jika misal perlu live coding di server yang terbatas resourcenya, dan
juga memudahkan untuk membaca codenya jika menggunakan editor seperti vim atau nano.

* Wrap isi function dengan indentasi yang tepat.

```php
// betul
function showMyName($id){
    global $names;
    if ($id == null){
        echo "id tidak boleh kosong";
        return;
    }
    echo $names[$id];
}

// salah
function showMyName($id){
    global $names;
    if ($id == null){
    echo "id tidak boleh kosong";
    return;
    }
    echo $names[$id];
    
// salah
function showMyName($id){
global $names;
if ($id == null){
echo "id tidak boleh kosong";
return;
}
echo $names[$id];
}
```

Note
----

Dokumentasi ini akan terus diupdate, silahkan ditambahkan jika dirasa ada yang kurang.
