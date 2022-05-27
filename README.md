# Manual

### Agregar permisos a los usuarios administradores

1. Buscar en la base de datos RRHH los trabajadores de SSMA

    ```
      SELECT * FROM rrhh.tabla_aquarius 
      WHERE rrhh.tabla_aquarius.dcostos LIKE '%<PROYECTO>%
    ```
2. Extraer los dni que desea agregar 
    ```
       dni 
    --------
    77100151
    789465258
    ```

3. Realizar los insert en la base de datos SSMA en la tabla ROLE 
    ```
    INSERT INTO role(idTypeRole,dni) VALUES (2,DNI1) , (2,DNI2) , ... , (N,DNI N);
    ```
### Agregar área a cada proyecto
```
+------------+          +-------------------+
|   general  |          |   area_general    |
+------------+          +-------------------+
| *cod*      |----+     |id                 |
| nombre     |    |     |nombreProyecto     |
+------------+    +---->|*idproyecto*       |
                        +-------------------+
 ```
1. Primero crearas el proyecto en la tabla general con clase '00'


```
Ejemplo : 

INSERT INTO general (clase,cod,nombre,texto) VALUES ('00','10','Pisco','');

```
En la siguiente tabla veremos los proyectos
```

mysql> SELECT cod,nombre FROM general WHERE clase = '00';
+------+-----------------------------------------------+
| cod  | nombre                                        |
+------+-----------------------------------------------+
| 00   | SEDES                                         |
| 01   | COMPRESION                                    |
| 02   | BLENDING                                      |
| 03   | PUCALLPA                                      |
| 04   | LURIN                                         |
| 05   | LIMA                                          |
| 06   | 20PP03 L. RELAVES ESTE / 00679                |
| 07   | FULL FLOW FLARE - SHUT DOW                    |
| 08   | SISTEMA CONTRA INCENDIOS                      |
| 09   | EPC - Obras Electromecánicas Varias Malvinas  |
+------+-----------------------------------------------+
```
2. Luego agregaras las areas que estan relacionadas a este proyecto en la siguiente tabla
Tomar en cuenta que en idproyecto vamos a colocar el cod que ingresamos en la parte de general y siguiendo el ejemplo tendremos que poner cod = 10

Ejemplo:

```
INSERT INTO area_general (nombre,idproyecto) VALUES ('área1', 10 ) ,  ('área2', 10 ) , ... ,('áreaN', 10 ); 
```
En la siguiente tabla veremos ya los proyecto y areas relacionados

```
mysql> SELECT * FROM area_general;
+------+------------------------------------+------------+
| id   | nombre                             | idproyecto |
+------+------------------------------------+------------+
|    1 | Of. Administrativa San Borja Norte |          5 |
|    2 | Of. Administrativa Aviación        |          5 |
|    3 | Ingreso                            |          4 |
|    4 | Zona de descarga                   |          4 |
|    5 | Oficinas                           |          4 |
|    6 | TMC Línea                          |          6 |
|    7 | Plataforma San Antonio             |          6 |
|    8 | Estación éste                      |          6 |
|    9 | Estación oeste                     |          6 |
|   10 | Crucé vía nacional                 |          6 |
|   11 | Oficinas administrativas           |          6 |
|   12 | Ingreso                            |          3 |
|   13 | Comedor                            |          3 |
|   14 | Oficinas administrativas           |          3 |
|   15 | Almacén principal                  |          3 |
|   16 | Almacén de productos químicos      |          3 |
|   17 | Habitaciones                       |          3 |
|   18 | Cocina                             |          3 |
|   19 | Pit de combustible                 |          3 |
|   20 | Taller de mantenimiento            |          3 |
|   21 | Taller de servicios generales      |          3 |
|   22 | Almacén de gases                   |          3 |
|   23 | Taller de pintura                  |          3 |
|   24 | Taller de soldadura                |          3 |
|   25 | Planta de tratamiento de aguas     |          3 |
|   26 | Km 0 Norte                         |          1 |
|   27 | Km 0 Sur                           |          1 |
|   28 | Area Consignada                    |          1 |
|   29 | AreaNo consignada                  |          1 |
|   30 | Taller C1                          |          1 |
|   31 | Campamento C6                      |          1 |
|   32 | Planta de Concreto                 |          1 |
|   33 | Km 0 Norte                         |          7 |
|   34 | Km 0 Sur                           |          7 |
|   35 | Area Consignada                    |          7 |
|   36 | AreaNo consignada                  |          7 |
|   37 | Taller C1                          |          7 |
|   38 | Campamento C6                      |          7 |
|   39 | Planta de Concreto                 |          7 |
|   40 | Km 0 Norte                         |          8 |
|   41 | Km 0 Sur                           |          8 |
|   42 | Area Consignada                    |          8 |
|   43 | AreaNo consignada                  |          8 |
|   44 | Taller C1                          |          8 |
|   45 | Campamento C6                      |          8 |
|   46 | Planta de Concreto                 |          8 |
|   47 | Km 0 Norte                         |          9 |
|   48 | Km 0 Sur                           |          9 |
|   49 | Area Consignada                    |          9 |
|   50 | AreaNo consignada                  |          9 |
|   51 | Taller C1                          |          9 |
|   52 | Campamento C6                      |          9 |
|   53 | Planta de Concreto                 |          9 |
|   54 | Botadero                           |          9 |
|   55 | EB4                                |          9 |
|   56 | Nuevo flare                        |          9 |
| 1000 |                                    |          0 |
+------+------------------------------------+------------+
```

3. Ahora nos dirigimos a ssma > public > js > top_news.js

En la línea numero 13  encontraremos una constante LISTA_AREA2 
```
const LISTA_AREA2 = '[{"id":1,"idProyecto":5,"nombre":"Of. Administrativa San Borja Norte"},{"id":2,"idProyecto":5,"nombre":"Of. Administrativa Aviación"},{"id":3,"idProyecto":4,"nombre":"Ingreso"},{"id":4,"idProyecto":4,"nombre":"Zona de descarga"},{"id":5,"idProyecto":4,"nombre":"Oficinas"},{"id":6,"idProyecto":6,"nombre":"TMF Línea "},{"id":7,"idProyecto":6,"nombre":"Plataforma San Antonio"},{"id":8,"idProyecto":6,"nombre":"Estación éste"},{"id":9,"idProyecto":6,"nombre":"Estación oeste"},{"id":10,"idProyecto":6,"nombre":"Crucé vía nacional"}...]'
```

La estructura que sigue es la siguiente.
```
    {   
    "id": 1  , // ID que genera en la tabla area_general
    "idProyecto":5, // Codigo del proyecto que genera en la tabla general
    "nombre":"Of. Administrativa San Borja Norte" // Nombre del área que esta relacionado al proyecto
    }

```

4. Agregar todas las nuevas áreas creadas en la tabla area_general con la estructura descrita en el punto 3

```
    {   
    "id": IdGenerado  , 
    "idProyecto": 10,
    "nombre":"Nombre del proyecto"
    }

```


### Agregar responsables por fase

1. Primero identificamos en la tabla general con clase '09' las fases 

```
mysql> SELECT cod,nombre FROM general WHERE clase = '09';
+------+---------------------+
| cod  | nombre              |
+------+---------------------+
| 00   | AREAS               |
| 01   | RRHH                |
| 02   | CONTROL DE PROYECTO |
| 03   | OBRAS CIVILES       |
| 04   | INGENIERIA          |
| 05   | CALIDAD             |
| 06   | PRECOM              |
| 07   | SSMA                |
| 08   | CAMPAMENTO          |
| 09   | ALMACEN             |
| 10   | MANT.MECANICO       |
| 11   | LOGISTICA           |
| 12   | PIPING              |
| 13   | TEC.INFORMATICA     |
| 14   | ELECTRICIDAD        |
| 15   | CONTRATISTA         |
| 16   | ADMINISTRACION      |
+------+---------------------+
```
2. Luego realizamos el insert de los responsables en relación a que área pertenecen

Ejemplo:
Vamos agregar un responsable que sea del área de tecnología que este asignado al proyecto Pisco

Fase :  13   | TEC.INFORMATICA 
Proyecto : 10  | Pisco
DNI : 123465798
correo : soporte@sepcon.net

```
INSERT INTO responsable (idFase , idProyecto ,dni ,correo) VALUES (13,10,'132456798' , soporte@sepcon.net);
```

Visualizaremos en esta tabla los responsables creados.
```
mysql> SELECT * FROM responsable;
+-----+--------+------------+-----------+-----------------------------------+
| id  | idFase | idProyecto | dni       | correo                            |
+-----+--------+------------+-----------+-----------------------------------+
|   1 | 01     |          9 | 42132408  | lcatacora@sepcon.net              |
|   2 | 02     |          9 | 40985994  | hhancco@sepcon.net                |
|   3 | 02     |          9 | 001560373 | gguardia@sepcon.net               |
|   4 | 03     |          9 | 004479323 | rguevara@sepcon.net               |
|   5 | 03     |          9 | 000686886 | rviveros@sepcon.net               |
|   6 | 03     |          9 | 000821937 | alvaromass@sepcon.net             |
|   7 | 03     |          9 | 06307130  | mmori@sepcon.net                  |
|   8 | 04     |          9 | 77100151  | jcuri@sepcon.net                  |
|   9 | 05     |          9 | 001558247 | garispe@sepcon.net                |
|  10 | 05     |          9 | 43766472  | msuarez@sepcon.net                |
|  11 | 06     |          9 | 40125807  | nperez@sepcon.net                 |
|  12 | 06     |          9 | 26733573  | Jpuma@sepcon.net                  |
+---------------------------------------------------------------------------+
```

3. Los responsables son llamados automaticamente desde la base de datos esto quiere decir que no modificaremos nada de codigo hardcodeado.

Si tienen alguna duda me pueden consulta al Whatssapp y con gusto les brindare mi apoyo.

Que tengan un buen día developer :D !!!!
