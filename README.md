# Tarea 2
# Bases de Datos
# "Cryptomonedas: P-Coin II"

**Grupo n°16 "Nombre de Grupo":**

- Rodrigo Alarcón (laxpo)
- Juan Parra (Avenfenix)
- Francisco Pizarro (MasterZer0xx)

## Supuestos y consideraciones:

- Al crear usuarios, sea mediante el CRUD o por propia accion de un usuario siempre esta cuenta será de rango 'user', por lo tanto, para alguien ser 'admin' deberá modicarse directamente en la BD.

- La PK a nivel de BD para la tabla de usuarios es la id de estos, a nivel de web se considera adicionalmente que existe unicidad de correos electronicos, con el fin de no tener mas de una cuenta asociada a un correo.


## Modificaciones al modelo dado:

- Se modifican los usuarios para que estos tuvieran un rango asociado.
- Se modifican las contraseñas de los usuarios, para que estan esten hasheados de por si.

## Modificaciones a la plantilla:

CRUD:
    - all.php:
        -- Se obtiene desde la BD los resultados de un query, teniendo asi todos los usuarios registrados en la BD.
    - all.html:
        -- En base a los resultados obtenidos en all.php se imprimieran en una tabla (hecha con php en html) todos los datos encontrados y solicitados de cada usuario
    - create.html:
        -- Nombre agregado a cada input, logrando asi ser leidas luego con los distntos $_POST obtenidos.
        -- Se ejecuta un query a la BD, buscando todos los paises en ella y sus respectivos codigos, para si despues mostrarlos en la lista de paises cada pais existente en la BD. Se hace esto con el fin de evitar errores al manipular el .html anterior que contenia cada pais manualmente.
    - create.php:
        -- Se incluye el navbar.html
        -- Se hace un query para obtener el ultimo id de usuario en la BD, con el fin de que al crear un nuevo usuario este adquiere una id sin ocupar (ultima id registrada + 1).
        -- En base a la contraseña ingresada se procesa esta misma, obteniendola hasheada.
        -- Una vez con todos los datos ingresados se verifica si ya existe un correo con usuario asociado, en caso de no haberlo se ingresa el nuevo usuario a la BD con todos los datos asociados, en caso de existir arroja un aviso (Para verificar si existe un correo se ve si existen filas en la BD de la tabla usuario con tal correo, en base a un query).
        -- Se utiliza html en php con Bootstrap, para imprimir en una pagina el resultado obtenido de la operacion.
    - delete.php:
        -- Se incluye navbar.html
        -- Se busca la id del usuario actual mediante una expresion regular.
        -- Se ejecuta un query a la BD con el id obtenido, eliminando al usuario por su id(PK a nivel de BD).
        -- Una vez ejectuado se muestra una pagina con el resultado obtenido con la query.
    - read.html:
        -- Se obtiene la id del usuario actual.
        -- Se busca mediante una query en la BD al usuario que tiene la id de la pagina actual, una vez encontrado se muestra todo lo obtenido con la query, usando php en html.
    - update.html:
        -- Mediante un query se obtienen los paises, para luego mostrarlos en la lista de paises, segun estan contenidos en la BD.
        -- Se obtiene la id del usuario actual mediante una R.E.
    - update.php:
        -- Se incluye navbar.html
        -- Con el fin de no tener 2 usuarios con el mismo correo se verifica mediante un query a la BD si existe o no ya un usuario con el correo ingresado en el form. Si no existe un correo existente, entonces se actualiza al usuario con tal id con los datos ingresados, si no, entonces se manda una advertencia diciendo que ya existe tal correo.
        -- Se imprime en el .php el resultado de las querys.
        

## Dificultades y tiempo estimado:

En un principio se tuvo dificultad tratando de seguir un estandar para usar html en php o php en html, pero en la realizacion de esta tarea se encontro que no se debia seguir estrictamente una de estas opciones, si no que se implemento una u otra segun esta fueran conveniente o segun las redirecciones dadas en la plantilla. Asi se llego a usar ambas en busca de una mejor versalitidad en los resultados mostrados en la pagina.

(Rodrigo): Dificultades al instalar y juntar las tecnologías (No poder iniciar servidor Apache, restaurar el dump, conectar la base de datos a la página)

- Francisco:
- Juan: 
- Rodrigo: 



