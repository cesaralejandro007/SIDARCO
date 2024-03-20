<?php include (call."Inicio.php"); ?>
<?php include (call."data-table.php"); ?>
<?php include (call."main.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consulta de historial clínico </h1>
                </div><!-- /.col -->
                <!-- /.col --> 
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> 
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header" style="background:#AEB6BF;">
                            <h3 class="card-title font-weight-bold">CRITERIOS DE BUSQUEDA</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="color:black"></i></button>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                           
                        </div>
                    </div>

            </div>
                <table id="example1" class="table table-striped table-hover table-responsive border">
                    <thead>
                        <tr>
                            <?php if($_SESSION['Nucleo familiar']['modificar']){ ?>
                                <th style="width: 20px;">Editar</th>
                            <?php } ?>
                            <?php if($_SESSION['Nucleo familiar']['eliminar']){ ?>
                                <th style="width: 20px;">Eliminar</th>
                            <?php } ?>
                            <th>Cedula</th>
                            <th>Persona</th>
                            <th>Diagnóstico</th>
                            <th>Tratamiento</th>
                            <th>Evolución</th>
                            <th>Fecha</th>
                            <th>Examen</th>
                            <th>Tipo de sangre</th>
                            <th>Antecedentes personales</th>
                            <th>Antecedentes familiares</th>
                            <th>Hábitos psicológicos</th>
                            <th>Peso</th>
                            <th>Altura</th>
                            <th>Talla</th>
                            <th>IMC</th>
                            <th>FC</th>
                            <th>FR</th>
                            <th>TA</th>
                            <th>Temperatura</th>
                        </tr>
                    </thead>
                    <tbody>
                        <script>

                            $(function() {
                                $.ajax({
                                    type: 'POST',
                                    url: BASE_URL + 'historial/consultar_historial_clinico'
                                }).done(function(datos) {
                                    var data = JSON.parse(datos);

                                    var table = $("#example1").DataTable({
                                        dom: "B<'row'<'col-sm-6'><'col-sm-6'f>>" +
                                    "<'row'<'col-sm-12'tr>>" +
                                    "<'row'<'col-sm-5'li><'col-sm-7'p>>",
                                    orderCellsTop: true,
                                    fixedHeader: true,    
                                        "data": data,
                                        "columns": [
                                        <?php if($_SESSION['Nucleo familiar']['modificar']){ ?>
                                            {
                                                "data": "editar"
                                            },
                                        <?php } ?>
                                        <?php if($_SESSION['Nucleo familiar']['eliminar']){ ?>  
                                            {
                                                "data": "eliminar"
                                            },
                                        <?php } ?>
                                        {
                                            "data": "cedula"
                                        },
                                        {
                                            "data": "persona"
                                        },
                                        {
                                            "data": "diagnostico"
                                        },
                                        {
                                            "data": "tratamiento"
                                        },
                                        {
                                            "data": "evolucion"
                                        },
                                        {
                                            "data": "fecha"
                                        },
                                        {
                                            "data": "examen"
                                        },
                                        {
                                            "data":"tipo_sangre"
                                        },
                                        {
                                            "data":"antecedentes_personales"
                                        },
                                        {
                                            "data":"antecedentes_familiares"
                                        },
                                        {
                                            "data":"habitos_psicologicos"
                                        },
                                        {
                                            "data":"peso"
                                        },
                                        {
                                            "data":"altura"
                                        },
                                        {
                                            "data":"talla"
                                        },
                                        {
                                            "data":"imc"
                                        },
                                        {
                                            "data":"fc"
                                        },
                                        {
                                            "data":"fr"
                                        },
                                        {
                                            "data":"ta"
                                        },
                                        {
                                            "data":"temperatura"
                                        }
                                        ],
                                        responsive: true,
                                        autoWidth: false,
                                        ordering: true,
                                        info: true,
                                        processing: true,
                                        pageLength: 10,
                                        lengthMenu: [5, 10, 20, 30, 40, 50, 100],
                                        columnDefs: [
                                        {
                                            targets: [2], // Indica que se aplica a la cuarta columna (contando desde 0)
                                            visible: false // Oculta la columna
                                        }
                                    ],
                                        buttons:[ 
                                    {
                                    extend:    'excelHtml5',
                                    filename: function() {
                                        return "EXCEL-Historial"      
                                    },          
                                    title: function() {
                                        var searchString = table.search();        
                                        return searchString.length? "Search: " + searchString : "Reporte de Historial"
                                    },
                                    text:      '<i class="fas fa-file-excel"></i> ',
                                    titleAttr: 'Exportar a Excel',
                                    className: 'btn text-success border border-success',
                                    exportOptions: {
                                        columns: [2,4,5,6,7,9,13,14,15,16,17,18,19,20]
                                    }
                                    },
                                    {
                                    extend:    'pdfHtml5',
                                    filename: function() {
                                        return "PDF-Historial"      
                                    },          
                                    title: function() {
                                        var searchString = table.search();        
                                        return searchString.length? "Search: " + searchString : ""
                                    },
                                    text:      '<i class="fas fa-file-pdf"></i> ',
                                    titleAttr: 'Exportar a PDF',
                                    className: 'btn text-danger border border-danger',
                                    customize: function ( doc ) {
                                    doc.pageMargins = [20, 60, 20,20 ];
                                    var cols = [];
                                    cols[0] = {        
                                    margin: [ 10, 0, 0, 2 ],
                                    alignment: 'start',
                                    image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAWYAAACNCAMAAACzDCDRAAABC1BMVEX8/v////8LRof93QDYKC/9///46ef94kHYJSXU2ecAOoIAPILnjYXXGSSUocIAL3wAQYSMmr798bUAQISqtc5RbKC0vNX3+fxbc6QANX/e4+wALXvw8/f8/PG6wthrgqvr7vUcSY2xvdA4XJTHzt/rqqn78u797qJHZJ0AJXnXEx7cTE0AKnva3uvfWE7l6fH+5FbgYVjgaWQsU5Geq8eElLkAG3bEyt57jLVle6k0V5QAGnX94THttrgAInmBlLX99c0AAG398rz965HxxsLpm5ZvgLE4XpOdqMmMmL9ObZz96X/99tH97Jj941D+53HVAA7ok47xxcD23dnaNTZhdKoAE3Y6V5lVa6UcKpc4AAAgAElEQVR4nO2di4OjtrXwOb5VWqABO7wx5THQFOfCpS0wPKaf5yZtd73b+0hvm03+/7/kO0dgGzyeGc8mm24bn2THGKQj6SfpSEeAJQhXucpVrnKVq1zlKle5ylWucpWrXOUqV7nKVa5ylatc5SpXucpVfhoCJGx2xPiRMBzxC/OAbPwUxlDTa2OUM+pnx9OYw1+2T0eYKd1n46Bi/8lm36ZJsmPEUcn0EhsjHwvJ/7KTksMhs2MO2UzbROkhb08J05W6rTxKXFztlDpnAvMUpV2JqIeFqxUIkFR4DPlKqauCzhYrxeIZEHf6kMWktTvd4xkNO3FSaFQ6xiINddcpIQynd8O5ZudjCqKyQy2Nwq/pLYxRV2M2rJ1SDMVs9eGaucLUoEqGbytlkiSzFKWulYTxLL5RlJW+v8oKRfEY5G8sxrwVBvNJu4LFY96bkEqOJ1d0EnYrBWlgquCvMBV4kxOiHV6mtDB9f1+PeRc+zxm6jVmte4raZGWluJTYVvbjLKHENw4moaf88sb2nQhLx/JNOWD2NwYHE2xWhVhyvGBmwRRzszF8yaHgUGWtJy5lcVAWD4SqbY3phFu1YGBTCZjQOy4M2rukzDA4s8pNzuuzyEqBp9yuO2DwdqhlT4q8Y0mZp61908BsUKKqo1T+AbNVYrFgZZPOjaxUDeWlVHVgxdaikktqxeuOVVWVOpRHuN9gNcCWZztW64rShHqz2mNeZdWsM53HfL/OhWhLUUXV5n2BWU4E+prXsRoRZpsuJ2oLfUbVEK7jsTWrHV3RsxbL7FlcnyEvJrUL4roFgyCBmPUYSiSNFNMYMOsqbx2ds4NizTtVokpDqxbX97Ba64QkVXlrBkVyhsp8IzkrANscmr/j+MeSMq9UsRzRmnCB5lgTowGVg/QljmxdDlcglp0EQpUR5ig7WIXQkai6QcFaEICnC8baHeLs1KE3Yh+UtfgizGKjpkPR08Sk1kqY643JMZeYhDli7nytFc5gtlXeALg612jVSZmRVecvqX3DSqWKsyIVa+oB5gQT0jtegq6SuXqslzo0MqwhJhhqyM1puXO4RYFVt8DS2zwlSHWnO8GM7d3hiiO58Y9WjIWO5ok92RNYLxqfW4K4k+QidKhkXumIY3Cs+aG2FappGDqh7egN7wGVOjZh8AN7nT/LGe7lyKkFXiynbO2CMEuLMuNAB8y6wUk4rztZYXPMHOBbNdmnAyvTXdsTzLkad/KKdz6VN8xSxQzj6QPm3WApVDHlleWVWG28TKKz0PqcXx0wQxNAJPG8rqrEcZKAm9HcgNI59qARszJi1oJuN8mP7ZgtJ4SYg47HL0VFLXNpwCzXHbdE0DijZRwwDz3AloOgnWM2XF9dXYDZ2TnxgBn58DEYW7M3HHnO3Gik3GKftubOoZwxHlUre23o4SPmdYDmv6FyU7tllrzGuFPMQ5upHHvIRSX1kcyLIq6V2EmmmO2oX3L7AHUFprNY8ONW6xfS0T5yzGjoVW5EI2lqNJCeaiy5IT8ajTLBph9J3GiUo9EgJeP4OhiN9YB5bzT2mMF1+lJbCs8NgnCfue3QcSe2WRtnbtjFQ4BU2WM21j7HnPKAe8zN2sCZkEVjv2m47tBdR/UUJFjz2QRaZQA/6/a2masYMbNCc4ZGJvuu6NCYiZjrXKUmNdpmcOXc1R3etbBFYnsl5DhsJa5PzWGKGYuv8ZqZ22bEUUrDED3DDKnszGwz1GjE9znEozyjpjO1zdUwN6xb1zWmQ8MjmO27JHRuqSP7G60z+ITuNttPU6usbONo6LHbWMlS3hS3cmdQA/W3w0xjtU1NvSQSkQmQbFS2r12M1SvrfpxpGI2uGnycG9JCFdVtPZTaoNEVLyyxcOmWBnf/LoBg2xLJaEth25YGJrLW0NX059akXoIVZkXb5jCd8KS10jrjxCdTbXs63YPVXTI0161jG7zBS4jZW9zxUUdVOzoJ4tZJOzttKPE+swOH2wXo14bN7WSd9Z1B00Ic3aEaJlxPCUv8EJKGbIHrN77JZ4++f8CU65VpDe3N982Em5KQAtKUw/XHjuXqVcVnXjiEMsv3D5ZyiDVQh5CH4rPrfVpwGHHyYThLqMJF0otRcQLg+1hFVsM1+lSRfNwCkafm02jaEPbkOM5R+qafj46N2fh+Mm3OobkPhTngYxfpBte39idFzoLEpCbMBJ8XjjeapvH5EChSQIvyiMZyyOQzzRnLPdqjiRc4uTxx745e4ElABnD0pdjULzrGOoaanp64a8ePQ372usa/k8NDasJczV73zPOclpdNizPAG4oyO8mOXuA023MncR+NXeQIXuUqV7nKP4mwfxn5R5N8Sthnf/j5pfIHLhcH/5Hlty8r9zjA/kgDJ/vNv10sv/kM5QXhf1z5+QsKjZN0N29M3xfd8GQWNM5gHpHTIE8mMwkyYv75V58d5Ku/PFKOoW/+9uT0XyZRn5A/flDG//YCzABFZZeS40j0r3yr5HNclf6ojI4BJOP3J9ermM/DsAnm306N3Gfny/HZEOE/H5y+SP7rw0K+GDOD3Hak5eIgmuykydF2MGErPSb79Smo1eHE0n2cMxNSh+LADPPk+iOY9w7OyenPLrJuD2rnB5fLMIPVqtriRJZqd1hpY4J6evkg8rhkACt5jFiGj3JmzKDK1F6I+Y97zP/9T4wZilga2rCj4n+HVu0cVhdfhHmh9Y+6+O+J+b/2QX71z4sZ3AVvyksnaELBcn1bGpr2ca38ZZgXmvEY5/fD/D9H6zUfBP+JMDOr5M132eOox/iczu2odS+Pd0HmmLWZOKsHmBdy98hC9/th/uqI+avZhd/8airThGYXvjqn9EfGDMGIpzguxsPOWczuSEwxx8FMOvMh5oXUnjfP74d5quHxsv7PVM/p1O/DyvOY6ZYbB6NPwDDYSQvJPYtZXp2fN88wLxzlLOf3wvyXaYA/PlrWjxtzNxriWTdn0MmxMJnQTTDX5xvqHPNk/PzemOfW4NGyfsyYWTjCKedUIHcm/f6kNV+CeeGYZ8K9D+bfzsz84wA/Zsz8BjGNd+mpd5363w/zwkkeBnwfzF/NMT86nn3UmPdwolMm8xvC74F5IYkPQr4H5j/86kTFHx4r68eMORjdv8nDFQ/l/TAvFw/c7jnmYSH0f6d4vjpd7PzDf5/ki/3mkfXQmZ7//cBLn3N5diEUjNHn0x4Z2b4H5jNu9wzzfll/HuD5FfNL1tYvW1P6weRZzOnetZaax5eZX4B5OeX8wO2eY/7pCNgHLjhzfnQp4mLMy262BiWfuN0nrfnh+jQ7Oyk/uUX/9Lr3eT0fVp7FfH/E4nThI6Avxyz51Wz5Q+5mKue2ORRJpuvT46mj5PwhCksUJ2YecvGc5FPbfD7Ih5L8Wcy7iUXVltX5G1QvwGxCLU05z93uGWao1pIkOf302aubbL6YPTxnq6/H5zOHQPuV7Zk43071GM6jC+TnxDn5fJlMM/cI5tyZQYl84QzoF2GGdsbZmYY/wcxXqNIZ5lncBX9wnwk4gExm4ayY5XmU5ay67OWZIGcije3rzdDYtPb1cnbhMlnGz2FmVjzX6MT+Q1Pz5JrG/jGqPWYG9qNu9wsxD4uEfNlFm7xrcRbi+2COXnGTKW29mGpO24jtGiMul2X94DbHE/I85rGs0zgc9MkEYYJZC07s3pjEATOGjmeZnDyX+kLMQ0xoSZ0zsRr+meb8Hpi1KJSidNmbCVhet1wmFo4NmFgr6+Z6UHBRbV2AmQn9qaqlE5206NlCqObMZLO/5XrALIA355wdOvxLjYbFH2bniU+WEPdL5PNcvwBzv+B3Ml5h17P6YaXdwNxnIkAgkQsBodktaWE9uITzBZhPrfMgjiFOG/RTd0+kh5gFKOYc5L3b/TLMw2Ig6PzcNNwZV+glmJdpsrbR3q9C4AbOaVyPrIQUJkAZp2ahx8ulYq+Sc8PAA30XYKYueKZtSPX08dkXYqaXBWbaomLv970Eszq8uTZ2t8n694n6IY3LMUsRhCFidVohTzDBpS6XNUaIW9VG3Jod+hYywZEB3PICI30RZgGSxRldUuo9cpPqJNw5zDhszcey0e1+EebhykHTdIpzWCOYhL4Yc0nD9Aq1yjtbNfoFtyCcgIajH36ksqqklKIFULxakoF+0nZchlmAMJUeRp54cC/HLEAzU6kNOXkR5nEA3C9uLSeeOzQPmvNFmOWFzEuGrZlWGbCpPsKP0lz6TWFuMEAnOe2TRugyzAIIuzOGQzqsJs0xRzN5BDO9FTkroM1ftXoJ5ogPgOHhu9NMulf0oKzPY17aVVbh0LaQCq182B8eitpVMnm2fuOfaYdHvRdiFhi46UPQh/cKZxO659yTwwllzpnc7pdgHozEOADylKdT54fLrhe0ZjW0PH5gPNqMT5VSmQKA+qmh8GLMtBxjlqc1ptlnMOPwf3YR8AFm4aHbzV6EmVfycQkRm/Px1WxwTzN7AWatw+FmRVde4uRprcWYtXoiygswY9YsRTppIrLLHmK+tDVjFwnmzsYOXoB5ObwMJ96pB9lM/MkHIC/AnPo+NPqFfvgkWmmKUf9EgBdhRixh68zmHPtHNd4PM5qIE7dbh8sxS3wAZJ5bHMSdvnR/ai0vMRrSpiill1JeLLWufThPnwZ4EWYCXRjT3O+t4XtipkWfWbWpPswwq7IsS/MVurU8ijS+LvbIXQomLCR5KtL03jwY84t7cTrn7Pnn5Ly2w9XHHxp8RNBEL4/VvTSGZzXeF7MA4dyVdxJ7gjlZKSjTBzroZ05GOff8wUy1qcxlN9WjKz+m7F4Gmeew6A8tcD9VfW/MqE2bd1Ju48a7J2duPbzkjsRTtzA+1G2SR+RFhMccWsaBc+l9T8xnpgRHzD9tgeKHa81kGh4OHxfc2Z5/O38T+Ynby9/vRvWL5RKqD7ANC7w/hG3mFx6uDo/3Av/0S5I/Twe2v/3yl8eTDH75QP42WdD68+zKTM+vH8b8gPLn5znDmwcPYUEydvTvO9MYr+innEfMv/76008//eI/pnj+H5369NOv/8ox/9/wbSLDhTHwX6eX53p+98VpzA8oX/z7BU9qLIIHmPP9opjyQ2A+dbuPmL/4GcrvZpj5qZ998QnH/PtPf/ZAJpg/mV2eYT4X88PJ85hZIZfeSaDD2qMj/iCYhdMlgecwf/r7wWZ8/bBEX0ytxgzmR40ZEmf2BPlwbsS8vzH+fTGzwysBl2H++k/s+GUuX0zsIPvTtB4+bsxE56Q574dAaf/I/ffFjJwN+QWYf8azzX53jtW0SOwXkwsfN2ab7srMn53aL/FKex/y8pciHsF88qDCM5iHFss++cW5Is2sxp8n7f1jxsxCWh+X2tnv7thDY1YPyKaYl4aymkrdnF/WP63OcHIX9nHM/NQ4AP76jM04sRqfTKzGx4x5fMNHSoe31eh9tTAd+vfksazZ3ZPlyWrM6iLM5PQsL8M8DoDnbcaJ1Zjg/KgxKwPTpdP5hSdYYb5ajobZPv+Kz6nMX798HPNxmvgc5i+GAfCTM/MMkq8/mQ6Cxxb/UWM+3JzQJLmM42i/su9000bzQ2Ce3Cd9GvPf2RM2A2vh15OMwd8P5z9mzCyY3gI8rIHKmn7p4zCXYz663U9iHo0v+/tjhfr7NMJxEPyoMUNiOPJ8rXIpye38bQYmZMvHRDrYZgm/nX1N7chZVymKJs0xTwRnGl9/zo/+9ojN4FbjKJ9MME/kI8NMEwtx1auOJPE3sGXJUdOqePCoYmo/Jsbo3EBl0LfmKcwC7AweZ4b580+44Mfnn+Op38PnJH99FNQXf/78KPC7/en/mOiBjw4zf3/AS/Sq7bquVfTGOvMo+ZPvGBzqi+S5sWASZW99p6swk++Pl+rT0xgPT39Qqg/kEsynGF94W+v9hf3661/8S8glK3T/OGFjL/8XkI+Y8o9+i+MDyj+a5FWu8qMKHJ+JEwb/iz+7yU8Lhzcfhyv7z/Hi+IPNk0vs8AyLMDMKo6LxAozXxuT3UdghpjA5Hu9GHr8yNs0zE04yNeR4EpVNtA8nQRBOMnhQMoSa5nv/eQx/zN2xyM8IY0kiWJ7nWV7hMY9+IB+PGYR+YlmeAFbS8MfJPUrHYyyn3+62Ej+0KJTru8AsvjOLwMIcBFKAX1Ab/Vy4x4U+BAibxGJeGNJzfyJGokP6HeycVPCw+J1ReOKQ41+PcsRQM2nEPFoe381B8CwQE2tUXVgwhKZM8SCMa/SGTAn7bPHU6KTloUtG6VEGrRMlmD5dYnvlmL6HgUIPMPl9eA/cAnNHGim4+9SPChwwB61R1ZlR+nedVBsOsBCdQKiiVWt8p4GorWirBGaVHeYkAogrgDwKlKh6lwjom/QdtBECt130TwBSvvNNpzV3CYD5TdyvUztQUwMUTanlXI7TKARxa4Gy6WgzB8sw9LLD+P6t3akKdKrB959Jd+Bt4iAyPCjpZ/wzsXmXlC0elfmXzarrXhnxOi6VrMt0gB7/iXK7it68c63U1qMAgh6VpnxLpRTAlto0SqzsHiBJwVJF8Lc5QJ30UvpNdVAiQHubg6LAq9gp++rWXnbwbnWz7dRK/BIL1FZlr8bfQbACz0nT0ktLC4KnflRgT7nIwAp3JUCz8XRJyVy42ZWKuBUxQ69ia6kA6HgS7MzHnEAoIUt61cg112KtoWOzqXZqC9AVkEoedHzzjroXnTIEfwfmxoI2Je1YqqYoqxDZKlkCumaBvinaHjsObbuQrF1obpNVDHxviMwGT9LBWwRW1CHDjZ9k+VsV85C6m8axIId8izUbQRcL3iYAS1uhEnMTdjFAsTGVNWbSph0XDMeDIKV3pKwIExI7EDMFmnUqgCIaqPyohLZtUgAryLLKCvJN7t+5juJrVt0XyB+UBm60UBC0HqxS9zK9S5kg95dg3mD2qgV2pI13I4lYNDssq/Y1/eR++zq5LbCPb3aIcSEXEEOTymEybH6kNhFt6GAbSr/2oS2sVPIh4PttKH3eSx34FZiZxzF39CAhQFl5axO6qIUbOQRrrWA1ChBEA2aQ7pWY73PhG6pnyQilXhaaFCKinZi5XbQMwUDMaosGeI85BTN1BH9L1qzJqASUqYq2n7LJQvWyCffYOMSsKQnzK6htLEis1ojZHjBjNZgG3wakK5sV3waHY27uQqlCzJ1d3LoMKo4ZEiMrrF63Nv4rA0Q7e95qMMtYx2Elp9+Kaz3WITUEG2GkvFG2r6stmU8H+1ogqimk0IWZ7zvDfkc+33hlVbZNLIVtaDY29lW+X4US562y0ZMd+IR5kXavbb4fQd+2neAqVclulh6zIkOmLVHqDDGriLkPFO27bwm8K5mWhFAqKXklV17X14RZXBuEWQzW5diaF3qPNAu1qVQyEM3ap21h0I5VTS9b3Br5WPWEOVfNEXOAupqbYJNUrr1IX+l7JcP2LLRhyoBZ3Rk7kHa+3MWeexseMNdiWbG+bjsIDFjhlwuasxVkQbVwC1Hq0XToC7OaYcYxCLDeobP0TWUIqVgGvjrFfF+2Yu4YrWckgTrBDIasVAPmuAgRM9ao+DrNRKiUKstvNMSsGfINQVmPmMtWKUMXW2CZx7ZAmHea6Ruvd4nRIhobqs3ORsxCjbyH1iwH4PVi2errE8y5mAWE2W5QPce8HjFjdWVVcmOVZevadhhWpTYoIauBDY3mIRyz1C8Ehpi1PLWnmMs8TSGmonRv8Ytxwd5f2JPrtFpQr20QW7GOQiGqanp0gIwGDhQsvMUBokO766SirXRys+Wbk6ybiHYTTDslgUqNREOp1SSgN0zgvkfMheToaJtHoxEBg3dNXNkp2CscD/2lB+FWX9I+MXiOY2bZDo0GnmhsJXBCDaF0vSnSHj1dlyBm2lOKMCP+yOKYe32d+x1mKuE70JDRUDClNFBEUBwN5zapcu8khBkHvZ4GgVXVKobd6NhQ1ILbZlTikhLayWcwewPmte9U4CBmS5fJUuKQicbOQwiBlPe6YSBm/NI6z1oNVuygCnaL0Gu2XrDwIDJwNFGKrYnV38VWRK+3LHBeY3s4HqWtC8W2iW0GhZ+Jq7UHOQ5bOAbbC0Wn1hjYXohWoBRbKpcO+hbHn97zxC2OXu/8sko2FZas7XXNE9Bg10uaeKCCJCugljysX2w1dgHuWkfMycZfuYAzkPu+yXJDgFCz3a2/QksK4l2OrVmIOpyNoN2NUa2rb0MqRLIVa6wLtLY0PkAcIOawtKmPQ+1/Z4G53t3giLbNDdvyKm1UwvfOsqkjMw/HnXwrrjJPVXzJa8uQbH7pwQ1+EXHU3vW6eJd0b/mXZ60GCyM7DZW+lxu5yGWdZjPWtyvwS9uusBnmqWGn2KKFb3C62fQ4plgp2oe4s/0oYW3ZlSY9hMe8/tuCIb0uTlOaWyQ09woQs4ytuf8WR5jIto0kVcCmF8LNCKN+1+IoiFFKsj0JlrRzMWwvQfgdNqv4mz7tDB/qAlbIszcj8Rvs077tak1pxDkkMtqfby0z+o7mm3WRppgpzRUC1IhDMjY+N8LpFtqiun/VB6ligRundp0HwIoovUFnJhW/6b/9Tu/3Smhnpo63Zq9XIJfFolTKnR/ZcQK+1qWYc70sUuou36UV2N+8MlI0qqn9rNVg3AdBESz65K0fP3A6jvN3PEUeCymhTRf5dZzswDCLx0LjHH504gS6JJAaPo3n3ho/TQH3CmG8RklYpGdUMZ5B942HFYZkLIpGyQx6rDEPdMDjWHv1h0zx70OmLF42QeAl2qdGfgoIQ3ieaYHn96iE8cLz7IzKKSD+w4YwJEoxxpIya8gt4xl7jvPoWwpHv3H0JYWZ97u/cHAwD375Ic7UqT2c36s4XJgGnKg4+ucTx3aSTYHt3W62D7tXfy5TBxd9ltpB5fFzUvLjn4Oy0aWelJUdcndQ+6+6QseuT/v/CMIs/4Ju+pHK0KHhuPoEwz4o9IeN62vHBbX9Xmr7PgbHBbvDpWlYHnG/oDdbhzvs1sa1H7/s/+wtw7CfG4/RGDB5VmdcrhvUwd6ADKpmy4hsovtgwSY5HYtz3Hd8wAAjABg2ctsX8f3e7GGhhf9DbhU4EHteAaEYei5KiP8KTxRxnouTiXz40R08DUKBVzz+IiwrXIwGReKBhedAGOPw5xB4WIoIqIqB67EwtCgas9CVLxKRj3iuaw3RmDB+iBjDEnGag6pDdM3EHEuN5wtocPpw+FEyyqPl4jyQ0YIahsGhEL9zHSynp8pEvIb5ZCHtVItqLPBElw+ZGIsXQkxCoLJhufdFZKSgwGks6XcLoiC4Sc4EVwAvKTCvyRNbYjwqUOtwb8KXRVnAK11PPfldVH2pZu/eyNu7b/XtXeRVKSi3dwa2gTDbSg302zvJXPB3fo1N1qGLcSe77naridYSw+vbWxlL6qlb+tm0uzsD2u2mAyeBthVpTw7wca77dnPX0eMim9vIRbXv3tIa4fZdD93tlzj9u9uuIMrhvsbD2xbnaOB+C50OVjT4BOixb283TVZEIXQVeDhVTgyc3CdfbjOcu6s4A3dQGUMvDugZH8u+e6d7y7uNDzc16Ar0mzvH3Nyq6M7cvmtveqhu7+itVbjb3PWrDupvNxvntlxtb78Mtc1tbb3zCvlunXjOZrt7OWcIWsDJ4rZ4beCEV7fNGETLMypUKnpWFUBkVra3EcMlZjZ0RMXxet/zmnLAXDVrMV6BHbhyXpfhMvE8/S3E6JJ567yOxXUeOkm7ElUxSqBuc4l786oAb3V3ix5JEoVdb62LEFtk6OSoWM29wpStZBv2Bk7nEycUs1zcWP6GMOeb4fkQJkSJF+ZOQYufOjomDYi3SZgBnsvR8zGhsoG8VnsnyjhB1J2wsFoDdgtY9eTyjYWwW/S7rPwm9ZAgrVLABtt2qKJ36jVRYdW1hfUkNhsrs3BqXcehnN+sX4yZCX1pYf0jZrVpEXMjY78CQ4dQ8tEP6DhmZA9tQJhDkNF1FoU9Zh0WtBonSjk6JFtxYYq0cTTO4ZmXWWK5w4hBXVdQNgfM2BDlBN5WxYZjxmaXO0lO5ktqROhoj/RAQR/OTNd+pdBOrr3uZ0m98RCzEhl7zKZouU5RZjlirtHFENXeXaMPjUkqZQf6gkwXJKVBq4E2+eKLBIRt0WlhXEJPhVhAV1cGXrkxEg1of1jEjMWGmhZ5RXRz2jZHzEmSIeYMPb8s10RffTlmS5JMKSXM38T2DSIyVHS4CbOWvRMqKSqtqsNGTXlAzAVEvpG9y0fMth1kouShj5xrIayTPnvnmVK0IKvorOIAex8owb3dZt4BM4iv37TQLeWAkReI9dloW5Vac7TZeClf0ERX+a0ed4v7HVoEbJEr543tiMgzRm99mDiX2ZdJgZi7FE9HpgZiWbYSsB6zX5qSZaX0eydMSDPMjIAOIrPQf4RNbki6puHpd3niRHJxf48J3hhYctB72vM5+5K2JKaFd8Rcq+92QC8wYI9TcxA24iJyTt8muQBzUX5XvtJgU8RN7BBmdPmtoTXjmFEZdovdT7exgrsBM7bmRoA95kWKPdWDXM013ppx+EI8Nt+hOeo82j+4bWst9rFJ7DGvOnOJvVVuuLNNrVkNyX9E7ZjyDhtXt8OaNksxdnbBCiDVg1eLOPUD3cuSRTNMJaLEYtiatUJ2zFxuZFHsE3UNYka/PNVEDeZYJlu749OTGE0eZQE2zaIug0Ue+/RjT20M9y3H7JcAu5Rac442RsnqAXO7opfOase1Mi/LAVv04o06+UWECwX8t37WaB5iFsWMMFu0Iz3HXGDCQbEpKltcW3SbioxGoxY9FgExkxeL4cBSEaDhap6+LJY5tom3lCEyGhjMYdj8aXts/MAeKsp0tFw67ltT72kIXICywA5Jsy0ySUAL/MXqLRRZXoriZoctzHOSPpfaXR3opqPR6iWB00TaVrvQQn9jVpImK2IE3YZuJNiH95IAAAQqSURBVIGOX1uwLJV2M66GxV0bnfFUgUZD+7b1sU1hIZISpMSXLHBvUnfr8Z3FYYvTmVAycRDlmNF8oW1ubSGjmzB6iba5e2TbkacwV13oQNxsizIBW9eNJLJx1MauGzqp0aJttlu0Xn1syNStszRb0ZfOV430BsgI41xF7jaJm6XbylriJf01LYkx7xY7qxW9fi2zgLK/kroN1qRh1E5uxdVb3XJ8WghNt763Nox7mmlgimFmpF2xthcGVbe98tZvyzTcCJ3pp4Fp1Jav5TLdu5Xwj5uh2YDULCurirFj5Fsvi43aVixf9UujFMbWjIYqs/tVsulUBYOpob1LqRBLtOJWGb9Nb2JIe75JPdxiJhQb7BoSrIB2YcRYzTiF2Xq62mWVtc7Fd5fcbZ1jbhrYgSkqXuWCm4i6t6qpRYpgVZWiizfgKo0JxereJUOgVNjTdUWpckVRRB4OzXvVNhAqVYJx8JKoQ6Hg3FShBffiflUA3z9boFAF/cIDrf7e3IjQYEd2MTx4ePYGKwZj41yixhhiXaHFKqAw8VDxPIU1RVH5ooK5UMKeftqkwkljqHg7tFi+EmL6It11KZQKE3BRZb66L/gYOPwSIaoJwW91EE3QhcTnhcCZoBJi2fIcmxV+8HsTpCCHXBGKCvFg1giNbioWmK0JFqqpzuzS8BxnELibwwbfizt//Oz+x6wZHDe+3l88POB52J36+Gf4ZAcHkW/oPQ21V8FPH88K4weMW4CTZ0qrGIMvdvBN6TdWIv7QxeCW7QOPWdvvtn3c6Puwk/e4szj9f3hE8+DzjgUQ9qUbCAzfDmnsi/ZefuA/m7Ci+CkU84PJpQbvX3UB8kMIGy3BcRFKsGZWZNpPxyWcw4FwWG26ypMCqxa9irRQulf8jhpj1avWxgHVqmoTWFUn4NY46ug1jps4CFrKSsSBeOVZu1XCpw717uLm/9MV6HxvI6gFDv38fheQvyjiHC1s0UvRgzAKy1xvG9uK3Fg0g9AUHUgTvwt1V6KnXbSwvuA5iZ+6QLBD11Iu6sB0zZSmwS4Mgzw6ax429OANToOj+wr9DRndBaFQWsHxBMkLqxZDJT39/48uxUcvEKToR0pFXTeul2PrRDcDKl3BuWulQGfC/SvCjI29bSN0lQRXMTzJE5ywqFLh/l5PyYf7R5fioxc0GuizOmQ0wCLny0avdqWYVZigU4/euUGLQT0ip4OiRDdcyzUvXOBB5Oo6Ovv+8/fvf/IChu5l/taltTg9pmcy+6CKELW4LaWboq9SbMZGE/ZVjKOl7ZttbcMu6PQmUGyyLrbSP9zJ7SqnQlMz8j9pthByhy7M+QMRfC4n5HTvy4PxAJuwiz4JPyjc4QbeEPoql8v8yY3hWJjeLn1wIFydlKtc5SpXucpVrnKVq1zlKle5ylV+CvL/ARFa3uqm4WCqAAAAAElFTkSuQmCC',
                                    width: 150,
                                    height: 50};
                                    cols[1] = {text: "Reporte de Historial", alignment: 'start', margin:[95, 20, 20, 20 ] };
                                    var objFooter = {};
                                    objFooter['columns'] = cols;
                                    doc['header']=objFooter;
                                    // Splice the image in after the header, but before the table
                                    },
                                    exportOptions: {
                                        columns: [2,4,5,6,7,9,13,14,15,16,17,18,19,20]
                                    }
                                },
                                ]  
                                } );
                                table.buttons().container()
                                    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

                                    table.buttons().container()
                                    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
                                }).fail(function() {
                                    alert("error")
                                })

                                $(document).on('click', '#enviar', function() {

                                    swal({
                                            title: "Atención",
                                            text:
                                            "Estás por actualizar los datos del historial clinico ¿Desea continuar?",
                                            type: "warning",
                                            showCancelButton: true,
                                            cancelButtonColor: '#d33',
                                            confirmButtonColor: '#15406D',
                                            cancelButtonText: "No",
                                            confirmButtonText: "Si",
                                            closeOnConfirm: false,
                                        },
                                        function (isConfirm) {
                                            if (isConfirm) {
                                                        var cedula=document.getElementById("cedula_persona");
                                                        var examen=document.getElementById("examen");
                                                        var tipo_sangre=document.getElementById('tipo_sangre');
                                                        var peso=document.getElementById("peso");
                                                        var altura=document.getElementById("altura");
                                                        var talla=document.getElementById("talla");
                                                        var imc=document.getElementById("imc");
                                                        var fc=document.getElementById("fc");
                                                        var fr=document.getElementById("fr");
                                                        var fr=document.getElementById("ta");
                                                        var temperatura=document.getElementById("temperatura");
                                                        var diagnostico=document.getElementById("diagnostico");
                                                        var tratamiento=document.getElementById("tratamiento");
                                                        var evolucion=document.getElementById("evolucion");

                                                        var datos_historial=new Object();
                                                        datos_historial['cedula']=cedula.value;
                                                        datos_historial['examen']=examen.value;
                                                        datos_historial['tipo_sangre']=tipo_sangre.value;
                                                        datos_historial['peso']=peso.value;
                                                        datos_historial['altura']=altura.value;
                                                        datos_historial['talla']=talla.value;
                                                        datos_historial['imc']=imc.value;
                                                        datos_historial['fc']=fc.value;
                                                        datos_historial['fr']=fr.value;
                                                        datos_historial['ta']=ta.value;
                                                        datos_historial['temperatura']=temperatura.value;
                                                        datos_historial['diagnostico']=diagnostico.value;
                                                        datos_historial['tratamiento']=tratamiento.value;
                                                        datos_historial['evolucion']=evolucion.value;
                                                        $.ajax({
                                                        type:"POST",
                                                        url:BASE_URL+"historial/actualizar_historial",
                                                        data:{"datos":datos_historial}
                                                    }).done(function(result){
                                                    console.log(result);
                                                    swal({
                                                        title:"Éxito",
                                                        text:"Familia Actualizada satisfactoriamente",
                                                        timer:2000,
                                                        showConfirmButton:false,
                                                        type:"success"
                                                    });
                                                    setTimeout(function(){location.href=BASE_URL+"historial/Consultas";},2000);
                                                });
                                            }
                                        });
                             });
//personal
                                $(document).on('click', '#btn_agregar_ante_p', function() {
                                    
                                    if(document.getElementById('id_ant_personal').value=="0" || document.getElementById('desc_antecedentes_personales').value ==""){
                                        descri_imput1.focus();
                                        valid_ante_person.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Debe ingresar el antecedente personal y la descripción.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                        setTimeout(function () {
                                            $("#cerraralert1").click();
                                        }, 6000);
                                    }
                                    else{
                                        descri_imput1.innerHTML="";
                                            $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'historial/agregar_antec_personal',
                                            data:{'id_historial':document.getElementById('id_historiales_clinicos').value,'cedula_persona':document.getElementById('cedula_persona').value,'id_ant_personal':document.getElementById('id_ant_personal').value,'desc_antec_perso':document.getElementById('desc_antecedentes_personales').value}
                                            })
                                            .done(function (datos) {
                                                var data = JSON.parse(datos);
                                                var antPersonales = data.ant_personales;
                                                if(data==1){
                                                    document.getElementById('valid_ante_pers').innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">El registro ya existe.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else{
                                                    document.getElementById('antec_pers_agg').innerHTML = "";
                                                    if (antPersonales.length === 0) {
                                                        document.getElementById('antec_pers_agg').innerHTML = "No aplica";
                                                    } else {
                                                        var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Nombre</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
                                                        for (var i = 0; i < antPersonales.length; i++) {
                                                            texto += "<tr><td>" +
                                                                antPersonales[i]["nombre_personal"] +
                                                                "</td><td>" +
                                                                antPersonales[i]["descripcion_personales"] +
                                                                "</td>" +
                                                                "<td><span onclick='editar_antec_personal(" + antPersonales[i]['id_ant_personal'] + "," + antPersonales[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_antec_personal(" + antPersonales[i]['id_ant_personal'] + "," + antPersonales[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                                                        }
                                                        document.getElementById('antec_pers_agg').innerHTML = texto + "</table>";
                                                    }
                                                }
                                        });
                                    }
                               });

//familiar
                               $(document).on('click', '#agregar_ante_familiar', function() {
                                    
                                    if(document.getElementById('id_ant_familiar').value=="0" || document.getElementById('desc_antecedentes_familiar').value ==""){
                                        descri_imput1.focus();
                                        document.getElementById('valid_ante_famy').innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Debe ingresar el antecedente familiar y la descripción.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                        setTimeout(function () {
                                            $("#cerraralert1").click();
                                        }, 6000);
                                    }
                                    else{
                                        descri_imput1.innerHTML="";
                                            $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'historial/agregar_antec_familiar',
                                            data:{'id_historial':document.getElementById('id_historiales_clinicos').value,'cedula_persona':document.getElementById('cedula_persona').value,'id_ant_familiar':document.getElementById('id_ant_familiar').value,'desc_antec_famy':document.getElementById('desc_antecedentes_familiar').value}
                                            })
                                            .done(function (datos) {
                                                var data = JSON.parse(datos);
                                                var antFamiliares = data.ant_familiares;
                                                if(data==1){
                                                    document.getElementById('valid_ante_famy').innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">El registro ya existe.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else{
                                                    document.getElementById('antec_famy_agg').innerHTML = "";
                                                    if (antFamiliares.length === 0) {
                                                        document.getElementById('antec_famy_agg').innerHTML = "No aplica";
                                                    } else {
                                                        var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Nombre</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
                                                        for (var i = 0; i < antFamiliares.length; i++) {
                                                            texto += "<tr><td>" +
                                                                antFamiliares[i]["nombre_familiar"] +
                                                                "</td><td>" +
                                                                antFamiliares[i]["descripcion_familiar"] +
                                                                "</td>" +
                                                                "<td><span onclick='editar_antec_familiar(" + antFamiliares[i]['id_ant_familiar'] + "," + antFamiliares[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_antec_familiar(" + antFamiliares[i]['id_ant_familiar'] + "," + antFamiliares[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                                                        }
                                                        document.getElementById('antec_famy_agg').innerHTML = texto + "</table>";
                                                    }
                                                }
                                            });
                                    }
                               });

//habitos
                               $(document).on('click', '#agregar_habit_psicolog', function() {
                                    
                                    if(document.getElementById('id_habit_psicologico').value=="0" || document.getElementById('desc_habitos_psicol').value ==""){
                                        descri_imput1.focus();
                                        document.getElementById('valid_habit_psicolog').innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Debe ingresar el habito psicológico y la descripción.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                        setTimeout(function () {
                                            $("#cerraralert1").click();
                                        }, 6000);
                                    }
                                    else{
                                        descri_imput1.innerHTML="";
                                            $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'historial/agregar_habit_psicologico',
                                            data:{'id_historial':document.getElementById('id_historiales_clinicos').value,'cedula_persona':document.getElementById('cedula_persona').value,'id_habit_psicologico':document.getElementById('id_habit_psicologico').value,'desc_habitos_psicol':document.getElementById('desc_habitos_psicol').value}
                                            })
                                            .done(function (datos) {
                                                var data = JSON.parse(datos);
                                                var habitPsicologicos = data.habit_psicologicos;
                                                if(data==1){
                                                    document.getElementById('valid_habit_psicolog').innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">El registro ya existe.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else{
                                                    document.getElementById('habit_psicolog_agg').innerHTML = "";
                                                    if (habitPsicologicos.length === 0) {
                                                        document.getElementById('habit_psicolog_agg').innerHTML = "No aplica";
                                                    } else {
                                                        var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Nombre</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
                                                        for (var i = 0; i < habitPsicologicos.length; i++) {
                                                            texto += "<tr><td>" +
                                                                habitPsicologicos[i]["nombre_habit"] +
                                                                "</td><td>" +
                                                                habitPsicologicos[i]["descripcion_habit"] +
                                                                "</td>" +
                                                                "<td><span onclick='editar_habit_psicol(" + habitPsicologicos[i]['id_habit_psicologico'] + "," + habitPsicologicos[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_habit_psicol(" + habitPsicologicos[i]['id_habit_psicologico'] + "," + habitPsicologicos[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                                                        }
                                                        document.getElementById('habit_psicolog_agg').innerHTML = texto + "</table>";
                                                    }
                                                }
                                            });
                                    }
                               });

                            });

                            
                        </script>
                    </tbody>
                    <tfoot>
                        <tr>
                            <?php if($_SESSION['Nucleo familiar']['modificar']){ ?>
                                <th>Editar</th>
                            <?php } ?>
                            <?php if($_SESSION['Nucleo familiar']['eliminar']){ ?>
                                <th>Eliminar</th>
                            <?php } ?>
                            <th>Cedula</th>
                            <th>Persona</th>
                            <th>Diagnóstico</th>
                            <th>Tratamiento</th>
                            <th>Evolución</th>
                            <th>Fecha</th>
                            <th>Examen</th>
                            <th>Tipo de sangre</th>
                            <th>Antecedentes personales</th>
                            <th>Antecedentes familiares</th>
                            <th>Hábitos psicológicos</th>
                            <th>Peso</th>
                            <th>Altura</th>
                            <th>Talla</th>
                            <th>IMC</th>
                            <th>FC</th>
                            <th>FR</th>
                            <th>TA</th>
                            <th>Temperatura</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<?php include modal."editar-historial.php"; ?> 
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>
<?php include (call."style-agenda.php"); ?>

<script type="text/javascript" src="<?php echo constant('URL')?>config/plugins/datatables/media/js/sum.js"></script>


<script type="text/javascript">

    var keyup_descripcion = /^[A-ZÁÉÍÓÚa-zñáéíóú0-9,.#%$^&*:\s]{2,100}$/;

    function editar(id_historial_clinico,cedula,info){
        $("#actualizar").modal({ backdrop: "static", keyboard: false });
        document.getElementById('cedula_persona').value = cedula;
        document.getElementById('id_historiales_clinicos').value = id_historial_clinico;
     $.ajax({
         type:"POST",
         url:BASE_URL+"historial/consultar_datos_clinicos",
         data:{'id_historial':id_historial_clinico,'cedula':cedula}
     }).done(function(datos) {
    var data = JSON.parse(datos);
    var info_persona = JSON.parse(info);
    var antPersonales = data.ant_personales;
    var antFamiliares = data.ant_familiares;
    var habitPsicologicos = data.habit_psicologicos;
    var historialesClinicos = data.historiales_clinicos;

    var antecedentes_pers_agg = document.getElementById('antec_pers_agg');
    var antecedentes_familiar_agg = document.getElementById('antec_famy_agg');
    var habitos_psicologicos_agg = document.getElementById('habit_psicolog_agg');

    var tablaDatos = document.getElementById('info_persona');

// Construir la tabla utilizando los datos proporcionados
    var tablaHTML = '<table class="table table-striped"><div class="border border-bottom-0 border-dark rounded-top p-2 d-flex justify-content-center" style="background:#15406D;color:white;font-weight:bold">Datos Personales</div><thead><tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Ubicación</th></tr></thead><tbody>';

    // Iterar sobre los datos y construir las filas de la tabla
    info_persona.forEach(function(item) {
    tablaHTML += '<tr>';
    tablaHTML += '<td>' + item.cedula_persona + '</td>';
    tablaHTML += '<td>' + item.primer_nombre + '</td>';
    tablaHTML += '<td>' + item.primer_apellido + '</td>';
    tablaHTML += '<td>' + item.nombre_ubi + '</td>';
    tablaHTML += '</tr>';
    });

    // Cerrar la tabla
    tablaHTML += '</tbody></table>';

    // Insertar la tabla en el HTML
    tablaDatos.innerHTML = tablaHTML;

    // Antecedentes personales
    antecedentes_pers_agg.innerHTML = "";
    if (antPersonales.length === 0) {
        antecedentes_pers_agg.innerHTML = "No aplica";
    } else {
        var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Nombre</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
        for (var i = 0; i < antPersonales.length; i++) {
            texto += "<tr><td>" +
                antPersonales[i]["nombre_personal"] +
                "</td><td>" +
                antPersonales[i]["descripcion_personales"] +
                "</td>" +
                "<td><span onclick='editar_antec_personal(" + antPersonales[i]['id_ant_personal'] + "," + antPersonales[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_antec_personal(" + antPersonales[i]['id_ant_personal'] + "," + antPersonales[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
        }
        antecedentes_pers_agg.innerHTML = texto + "</table>";
    }

    // Antecedentes familiares
    antecedentes_familiar_agg.innerHTML = "";
    if (antFamiliares.length === 0) {
        antecedentes_familiar_agg.innerHTML = "No aplica";
    } else {
        var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Parentezco</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
        for (var i = 0; i < antFamiliares.length; i++) {
            texto += "<tr><td>" +
                antFamiliares[i]["nombre_familiar"] +
                "</td><td>" +
                antFamiliares[i]["descripcion_familiar"] +
                "</td>" +
                "<td><span onclick='editar_antec_familiar(" + antFamiliares[i]['id_ant_familiar'] + "," + antFamiliares[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_antec_familiar(" + antFamiliares[i]['id_ant_familiar'] + "," + antFamiliares[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
        }
        antecedentes_familiar_agg.innerHTML = texto + "</table>";
    }

    // Hábitos psicológicos
    habitos_psicologicos_agg.innerHTML = "";
    if (habitPsicologicos.length === 0) {
        habitos_psicologicos_agg.innerHTML = "No aplica";
    } else {
        var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Nombre</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
        for (var i = 0; i < habitPsicologicos.length; i++) {
            texto += "<tr><td>" +
                habitPsicologicos[i]["nombre_habit"] +
                "</td><td>" +
                habitPsicologicos[i]["descripcion_habit"] +
                "</td>" +
                "<td><span onclick='editar_habit_psicol(" + habitPsicologicos[i]['id_habit_psicologico'] + "," + habitPsicologicos[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_habit_psicol(" + habitPsicologicos[i]['id_habit_psicologico'] + "," + habitPsicologicos[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
        }
        habitos_psicologicos_agg.innerHTML = texto + "</table>";
    }

    // Datos del historial clínico
    document.getElementById('examen').value = historialesClinicos[0]['examen'];
    document.getElementById('tipo_sangre').value = historialesClinicos[0]['tipo_sangre'];
    document.getElementById('peso').value = historialesClinicos[0]['peso'];
    document.getElementById('altura').value = historialesClinicos[0]['altura'];
    document.getElementById('talla').value = historialesClinicos[0]['talla'];
    document.getElementById('imc').value = historialesClinicos[0]['imc'];
    document.getElementById('fc').value = historialesClinicos[0]['fc'];
    document.getElementById('fr').value = historialesClinicos[0]['fr'];
    document.getElementById('ta').value = historialesClinicos[0]['ta'];
    document.getElementById('temperatura').value = historialesClinicos[0]['temperatura'];
    document.getElementById('diagnostico').value = historialesClinicos[0]['diagnostico'];
    document.getElementById('tratamiento').value = historialesClinicos[0]['tratamiento'];
    document.getElementById('evolucion').value = historialesClinicos[0]['evolucion'];
});
 }
    function editar_antec_personal(id,cedula) {
        $.ajax({
            type:"POST",
            url:BASE_URL+"historial/consultar_per_ant_perso",
            data:{'id_antec_personal':id,'cedula':cedula}
        }).done(function(datos){
            var data = JSON.parse(datos);
            console.log(datos);
        Swal.fire({
            title: 'Información del antecedente personal:',
            html:
            '<span id="validar_editar_antecedente"></span>'+
            '<span id="v1" style="font-size:14px"></span>'+

            '<div class="d-flex align-items-start">'+

                '<div class="input-group mb-3 col-12">'+
                '<span class="input-group-text">Antecedente</span>'+
                '<select class="form-control" id="id_antec_pers" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"><option value="0">Seleccione antecedentes personal</option><option value="1">Infectocontagiosos</option><option value="2">Cardiovasculares</option><option value="3">Alérgicos</option><option value="4">Quirúrgicos</option><option value="5">Traumáticos</option><option value="6">Gineco-Obstetra</option><option value="7">otros antecedentes</option></select>'+
                '<span id="v6" style="font-size:14px"></span>'+
                '</div>'+


            '</div>'+

            '<div class="d-flex align-items-start">'+

                '<div class="input-group mb-3 col-12">'+
                '<span class="input-group-text" id="inputGroup-sizing-default">Descripción</span>'+
                '<input type="text" id="descripcion_ante_perso" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default placeholder="Apellido" value="'+ data[0].descripcion_personales +'"">'+
                '<span id="v1" style="font-size:14px"></span>'+
                '</div>'+


            '</div>',
            confirmButtonColor: '#15406D',
            confirmButtonText: "Actualizar",
            width: '400px',
            padding: '1em',
            customClass: {
                modal: 'no-scroll',
            },
            focusConfirm: true,
            preConfirm: () => {
                if(document.getElementById('id_antec_pers').value != ""
                 && document.getElementById('descripcion_ante_perso').value != ""
){
                    a = valida_registrar_perso();
                    if (a != "") {
                        return false;
                    }else {
                        $.ajax({
                        type: "POST",
                        url: BASE_URL + "historial/modificar_antecedente_personal",
                        data: {
                                'id_historial':document.getElementById('id_historiales_clinicos').value,
                                "cedula_persona" : data[0].cedula_persona,
                                "id_antecedente_personales" : data[0].id_per_personas,
                                "id_antec_pers": document.getElementById('id_antec_pers').value,
                                "descripcion_ante_perso": document.getElementById("descripcion_ante_perso").value, 
                            }
                        }).done(function (result) {
                            if(result==1){
                                document.getElementById("validar_editar_antecedente").innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">El registro ya existe.<i class="far fa-times" id="cerraralert2" data-dismiss="alert" aria-label="Close"></i></div>';
                                setTimeout(function () {
                                    $("#cerraralert2").click();
                                }, 6000);
                                return false;
                            }else{
                                swal({
                                    title: "Éxtito",
                                    text: "La persona ha sido modificada satisfactoriamente",
                                    type: "success",
                                    timer: 2000,
                                    showConfirmButton: false,
                                });
                                    var data = JSON.parse(result);
                                    var antPersonales = data.ant_personales;
                                    document.getElementById('antec_pers_agg').innerHTML = ""; 
                                    if (antPersonales.length === 0) {
                                        document.getElementById('antec_pers_agg').innerHTML = "No aplica";
                                    } else {
                                        var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Nombre</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
                                        for (var i = 0; i < antPersonales.length; i++) {
                                            texto += "<tr><td>" +
                                                antPersonales[i]["nombre_personal"] +
                                                "</td><td>" +
                                                antPersonales[i]["descripcion_personales"] +
                                                "</td>" +
                                                "<td><span onclick='editar_antec_personal(" + antPersonales[i]['id_ant_personal'] + "," + antPersonales[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_antec_personal(" + antPersonales[i]['id_ant_personal'] + "," + antPersonales[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                                        }
                                        document.getElementById('antec_pers_agg').innerHTML = texto + "</table>";
                                    }
                                    Swal.close('mi-sweet-alert');  
                                }
                        });
                        return false;     
                    }
                }else{
                    document.getElementById("validar_editar_integrant").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">Complete los campos solicitados.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                    setTimeout(function () {
                        $("#cerraralert").click();
                    }, 3000);
                    return false;
                }
            }
        })

        document.getElementById("id_antec_pers").value = data[0].id_ant_personal;

        document.getElementById("descripcion_ante_perso").onkeypress = function (e) {
            er = /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/;
            validarkeypress(er, e);
        };
        document.getElementById("descripcion_ante_perso").onkeyup = function () {
        r = validarkeyup(
            keyup_descripcion,
            this,
            document.getElementById("v1"),
            "Solo letras de 2 a 200 caracteres, siendo la primera en mayúscula."
        );
        };

    });
    }

    function editar_antec_familiar(id,cedula) {
        $.ajax({
            type:"POST",
            url:BASE_URL+"historial/consultar_per_ant_fam",
            data:{'id_antec_familiar':id,'cedula':cedula}
        }).done(function(datos){
            var data = JSON.parse(datos);
            console.log(datos);
        Swal.fire({
            title: 'Información del antecedente familiares:',
            html:
            '<span id="validar_editar_antecedente_fami"></span>'+
            '<span id="v1" style="font-size:14px"></span>'+

            '<div class="d-flex align-items-start">'+

                '<div class="input-group mb-3 col-12">'+
                '<span class="input-group-text">Antecedente</span>'+
                '<select class="form-control" id="id_antec_fami" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"><option value="0">Seleccione antecedente familiar</option><option value="1">Madre</option><option value="2">Padre</option><option value="3">Hermanos</option><option value="4">Otros familiares</option></select>'+
                '<span id="v6" style="font-size:14px"></span>'+
                '</div>'+
            '</div>'+

            '<div class="d-flex align-items-start">'+

                '<div class="input-group mb-3 col-12">'+
                '<span class="input-group-text" id="inputGroup-sizing-default">Descripción</span>'+
                '<input type="text" id="descripcion_ante_fami" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default placeholder="Apellido" value="'+ data[0].descripcion_familiar +'"">'+
                '<span id="v1" style="font-size:14px"></span>'+
                '</div>'+
            '</div>',
            confirmButtonColor: '#15406D',
            confirmButtonText: "Actualizar",
            width: '400px',
            padding: '1em',
            customClass: {
                modal: 'no-scroll',
            },
            focusConfirm: true,
            preConfirm: () => {
                if(document.getElementById('id_antec_fami').value != ""
                 && document.getElementById('descripcion_ante_fami').value != ""
){
                    a = valida_registrar_famy();
                    if (a != "") {
                        return false;
                    }else {
                        $.ajax({
                        type: "POST",
                        url: BASE_URL + "historial/modificar_antecedente_familiar",
                        data: {
                                'id_historial':document.getElementById('id_historiales_clinicos').value,
                                "cedula_persona" : data[0].cedula_persona,
                                "id_antecedente_familiares" : data[0].id_fam_personas,
                                "id_antec_fami": document.getElementById('id_antec_fami').value,
                                "descripcion_ante_fami": document.getElementById("descripcion_ante_fami").value, 
                            }
                        }).done(function (result) {
                            if(result==1){
                                document.getElementById("validar_editar_antecedente_fami").innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">El registro ya existe.<i class="far fa-times" id="cerraralert2" data-dismiss="alert" aria-label="Close"></i></div>';
                                setTimeout(function () {
                                    $("#cerraralert2").click();
                                }, 6000);
                                return false;
                            }else{
                                swal({
                                    title: "Éxtito",
                                    text: "La persona ha sido modificada satisfactoriamente",
                                    type: "success",
                                    timer: 2000,
                                    showConfirmButton: false,
                                });
                                var antecedentes_familiar_agg = document.getElementById('antec_famy_agg');
                                var data = JSON.parse(result);
                                var antFamiliares = data.ant_familiares;
                                antecedentes_familiar_agg.innerHTML = "";
                                if (antFamiliares.length === 0) {
                                    antecedentes_familiar_agg.innerHTML = "No aplica";
                                } else {
                                    var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Parentezco</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
                                    for (var i = 0; i < antFamiliares.length; i++) {
                                        texto += "<tr><td>" +
                                            antFamiliares[i]["nombre_familiar"] +
                                            "</td><td>" +
                                            antFamiliares[i]["descripcion_familiar"] +
                                            "</td>" +
                                            "<td><span onclick='editar_antec_familiar(" + antFamiliares[i]['id_ant_familiar'] + "," + antFamiliares[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_antec_familiar(" + antFamiliares[i]['id_ant_familiar'] + "," + antFamiliares[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                                    }
                                    antecedentes_familiar_agg.innerHTML = texto + "</table>";
                                } 
                                    Swal.close('mi-sweet-alert');  
                                }
                        });
                        return false;     
                    }
                }else{
                    document.getElementById("validar_editar_antecedente_fami").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">Complete los campos solicitados.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                    setTimeout(function () {
                        $("#cerraralert").click();
                    }, 3000);
                    return false;
                }
            }
        })

        document.getElementById("id_antec_fami").value = data[0].id_ant_familiar;

        document.getElementById("descripcion_ante_fami").onkeypress = function (e) {
            er = /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/;
            validarkeypress(er, e);
        };
        document.getElementById("descripcion_ante_fami").onkeyup = function () {
        r = validarkeyup(
            keyup_descripcion,
            this,
            document.getElementById("v1"),
            "Solo letras de 2 a 200 caracteres, siendo la primera en mayúscula."
        );
        };

    });
    }

    function editar_habit_psicol(id,cedula) {
        $.ajax({
            type:"POST",
            url:BASE_URL+"historial/consultar_per_habit_psicol",
            data:{'id_habit_psicol':id,'cedula':cedula}
        }).done(function(datos){
            var data = JSON.parse(datos);
            console.log(datos);
        Swal.fire({
            title: 'Información del hábito psicológico:',
            html:
            '<span id="validar_editar_habito"></span>'+
            '<span id="v1" style="font-size:14px"></span>'+

            '<div class="d-flex align-items-start">'+

                '<div class="input-group mb-3 col-12">'+
                '<span class="input-group-text">Hábito psicológico</span>'+
                '<select class="form-control" id="id_habito_psicologico" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"><option value="0">Seleccione hábito psicológico</option><option value="1">Alcohol</option><option value="2">Cafeicos</option><option value="3">Tabaquismo</option><option value="4">Drogas</option><option value="5">Sueño</option><option value="6">Actividad deportiva</option></select>'+
                '<span id="v6" style="font-size:14px"></span>'+
                '</div>'+

            '</div>'+

            '<div class="d-flex align-items-start">'+

                '<div class="input-group mb-3 col-12">'+
                '<span class="input-group-text" id="inputGroup-sizing-default">Descripción</span>'+
                '<input type="text" id="descripcion_habito" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default placeholder="Apellido" value="'+ data[0].descripcion_habit +'"">'+
                '<span id="v1" style="font-size:14px"></span>'+
                '</div>'+


            '</div>',
            confirmButtonColor: '#15406D',
            confirmButtonText: "Actualizar",
            width: '400px',
            padding: '1em',
            customClass: {
                modal: 'no-scroll',
            },
            focusConfirm: true,
            preConfirm: () => {
                if(document.getElementById('id_habito_psicologico').value != ""
                 && document.getElementById('descripcion_habito').value != ""
){
                    a = valida_registrar_habit();
                    if (a != "") {
                        return false;
                    }else {
                        $.ajax({
                        type: "POST",
                        url: BASE_URL + "historial/modificar_habito_psicologico",
                        data: {
                                'id_historial':document.getElementById('id_historiales_clinicos').value,
                                "cedula_persona" : data[0].cedula_persona,
                                "id_per_habito_psicologico" : data[0].id_habit_persona,
                                "id_habit_psicologico": document.getElementById('id_habito_psicologico').value,
                                "descripcion_habito": document.getElementById("descripcion_habito").value, 
                            }
                        }).done(function (result) {
                            if(result==1){
                                document.getElementById("validar_editar_habito").innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">El registro ya existe.<i class="far fa-times" id="cerraralert2" data-dismiss="alert" aria-label="Close"></i></div>';
                                setTimeout(function () {
                                    $("#cerraralert2").click();
                                }, 6000);
                                return false;
                            }else{
                                swal({
                                    title: "Éxtito",
                                    text: "La persona ha sido modificada satisfactoriamente",
                                    type: "success",
                                    timer: 2000,
                                    showConfirmButton: false,
                                });
                                    var data = JSON.parse(result);
                                    var habitPsicologicos = data.habit_psicologicos;
                                    document.getElementById('habit_psicolog_agg').innerHTML = ""; 
                                    if (habitPsicologicos.length === 0) {
                                        document.getElementById('habit_psicolog_agg').innerHTML = "No aplica";
                                    } else {
                                        var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Nombre</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
                                        for (var i = 0; i < habitPsicologicos.length; i++) {
                                            texto += "<tr><td>" +
                                                habitPsicologicos[i]["nombre_habit"] +
                                                "</td><td>" +
                                                habitPsicologicos[i]["descripcion_habit"] +
                                                "</td>" +
                                                "<td><span onclick='editar_habit_psicol(" + habitPsicologicos[i]['id_habit_psicologico'] + "," + habitPsicologicos[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_habit_psicol(" + habitPsicologicos[i]['id_habit_psicologico'] + "," + habitPsicologicos[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                                        }
                                        document.getElementById('habit_psicolog_agg').innerHTML = texto + "</table>";
                                    }
                                    Swal.close('mi-sweet-alert');  
                                }
                        });
                        return false;     
                    }
                }else{
                    document.getElementById("validar_editar_integrant").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">Complete los campos solicitados.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                    setTimeout(function () {
                        $("#cerraralert").click();
                    }, 3000);
                    return false;
                }
            }
        })

        document.getElementById("id_habito_psicologico").value = data[0].id_habit_psicologico;

        document.getElementById("descripcion_habito").onkeypress = function (e) {
            er = /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/;
            validarkeypress(er, e);
        };
        document.getElementById("descripcion_habito").onkeyup = function () {
        r = validarkeyup(
            keyup_descripcion,
            this,
            document.getElementById("v1"),
            "Solo letras de 2 a 200 caracteres, siendo la primera en mayúscula."
        );
        };

    });
    }

    function validarkeypress(er, e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key);
        a = er.test(tecla);
        if (!a) {
            e.preventDefault();
        }
    }

    function valida_registrar_perso() {
      var error = false;

      descripcion = validarkeyup(
        keyup_descripcion,
        document.getElementById("descripcion_ante_perso"),
        document.getElementById("v1"),
        "El campo debe contener de 2 a 200 caracteres"
      );

      if (
        descripcion == 0
      ) {
        error = true;
      }
      return error;
    }

    function valida_registrar_famy() {
      var error = false;

      descripcion = validarkeyup(
        keyup_descripcion,
        document.getElementById("descripcion_ante_fami"),
        document.getElementById("v1"),
        "El campo debe contener de 2 a 200 caracteres"
      );

      if (
        descripcion == 0
      ) {
        error = true;
      }
      return error;
    }

    function valida_registrar_habit() {
      var error = false;

      descripcion = validarkeyup(
        keyup_descripcion,
        document.getElementById("descripcion_habito"),
        document.getElementById("v1"),
        "El campo debe contener de 2 a 200 caracteres"
      );

      if (
        descripcion == 0
      ) {
        error = true;
      }
      return error;
    }

function validarkeyup(er, etiqueta, etiquetamensaje, mensaje) {
  a = er.test(etiqueta.value);
  if (!a) {
    etiquetamensaje.innerText = mensaje;
    etiquetamensaje.style.color = "red";
    etiqueta.classList.add("is-invalid");
    return 0;
  } else {
    etiquetamensaje.innerText = "";
    etiqueta.classList.remove("is-invalid");
    etiqueta.classList.add("is-valid");
    return 1;
  }
}


function eliminar(id,cedula){
	swal({
		type:"warning",
		title:"Atención",
		text:"Estás por eliminar esta familia, ¿ deseas continuar?",
		showCancelButton:true,
		cancelButtonText:"No",
		confirmButtonColor: '#9D2323',
		confirmButtonText:"Si"
	},function(isConfirm){
		if(isConfirm){
			$.ajax({
				type:"POST",
				url:BASE_URL+"historial/eliminar_historial_clinico",
				data:{'id':id,'cedula': cedula}
			}).done(function(result){
                     setTimeout(function(){
                    	swal({
                    		type:"success",
                    		title:"Éxito",
                    		text:"Se ha eliminado exitosamente esta familia",
                    		timer:2000,
                    		showConfirmButton:false
                    	});

                    	setTimeout(function(){location.reload();},1000);
                  },500);
			});
		}
	})
}

function borrar_antec_personal(id,cedula){
    swal({
      type:"warning",
      title:"¿Está seguro?",
      text:"Está por eliminar este antecedente , ¿desea continuar?",
      showCancelButton:true,
      confirmButtonText:"Si, continuar",
      cancelButtonText:"No"
  },function(isConfirm){
      if(isConfirm){
        $.ajax({
          type:"POST",
          url:BASE_URL+"historial/eliminar_antecedente_personal",
          data:{'id_historial':document.getElementById('id_historiales_clinicos').value,"id_antec":id,"cedula_persona":cedula}
      }).done(function(result){
        var data = JSON.parse(result);
        var antPersonales = data.ant_personales;
        document.getElementById('antec_pers_agg').innerHTML = ""; 
        if (antPersonales.length === 0) {
            document.getElementById('antec_pers_agg').innerHTML = "No aplica";
        } else {
            var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Nombre</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
            for (var i = 0; i < antPersonales.length; i++) {
                texto += "<tr><td>" +
                    antPersonales[i]["nombre_personal"] +
                    "</td><td>" +
                    antPersonales[i]["descripcion_personales"] +
                    "</td>" +
                    "<td><span onclick='editar_antec_personal(" + antPersonales[i]['id_ant_personal'] + "," + antPersonales[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_antec_personal(" + antPersonales[i]['id_ant_personal'] + "," + antPersonales[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
            }
            document.getElementById('antec_pers_agg').innerHTML = texto + "</table>";
        }          
      })
  }
});
}

function borrar_antec_familiar(id,cedula){
    swal({
      type:"warning",
      title:"¿Está seguro?",
      text:"Está por eliminar este antecedente , ¿desea continuar?",
      showCancelButton:true,
      confirmButtonText:"Si, continuar",
      cancelButtonText:"No"
  },function(isConfirm){
      if(isConfirm){
        $.ajax({
          type:"POST",
          url:BASE_URL+"historial/eliminar_antecedente_familiar",
          data:{'id_historial':document.getElementById('id_historiales_clinicos').value,"id_antec":id,"cedula_persona":cedula}
      }).done(function(result){
        var antecedentes_familiar_agg = document.getElementById('antec_famy_agg');
        var data = JSON.parse(result);
        var antFamiliares = data.ant_familiares;
        antecedentes_familiar_agg.innerHTML = "";
        if (antFamiliares.length === 0) {
            antecedentes_familiar_agg.innerHTML = "No aplica";
        } else {
            var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Parentezco</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
            for (var i = 0; i < antFamiliares.length; i++) {
                texto += "<tr><td>" +
                    antFamiliares[i]["nombre_familiar"] +
                    "</td><td>" +
                    antFamiliares[i]["descripcion_familiar"] +
                    "</td>" +
                    "<td><span onclick='editar_antec_familiar(" + antFamiliares[i]['id_ant_familiar'] + "," + antFamiliares[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_antec_familiar(" + antFamiliares[i]['id_ant_familiar'] + "," + antFamiliares[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
            }
            antecedentes_familiar_agg.innerHTML = texto + "</table>";
        }       
      })
  }
});
}

function borrar_habit_psicol(id,cedula){
    swal({
      type:"warning",
      title:"¿Está seguro?",
      text:"Está por eliminar este habito psicologico , ¿desea continuar?",
      showCancelButton:true,
      confirmButtonText:"Si, continuar",
      cancelButtonText:"No"
  },function(isConfirm){
      if(isConfirm){
        $.ajax({
          type:"POST",
          url:BASE_URL+"historial/eliminar_habitos_psicologicos",
          data:{'id_historial':document.getElementById('id_historiales_clinicos').value,"id_habit":id,"cedula_persona":cedula}
      }).done(function(result){
            var habitos_psicologicos_agg = document.getElementById('habit_psicolog_agg');
            var data = JSON.parse(result);
            var habitPsicologicos = data.habit_psicologicos;
            habitos_psicologicos_agg.innerHTML = "";
            if (habitPsicologicos.length === 0) {
                habitos_psicologicos_agg.innerHTML = "No aplica";
            } else {
                var texto = "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Nombre</td><td>Descripción</td><td>editar</td><td>Eliminar</td></tr>";
                for (var i = 0; i < habitPsicologicos.length; i++) {
                    texto += "<tr><td>" +
                        habitPsicologicos[i]["nombre_habit"] +
                        "</td><td>" +
                        habitPsicologicos[i]["descripcion_habit"] +
                        "</td>" +
                        "<td><span onclick='editar_habit_psicol(" + habitPsicologicos[i]['id_habit_psicologico'] + "," + habitPsicologicos[i]['cedula_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante'></span></td><td><span onclick='borrar_habit_psicol(" + habitPsicologicos[i]['id_habit_psicologico'] + "," + habitPsicologicos[i]['cedula_persona'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                }
                habitos_psicologicos_agg.innerHTML = texto + "</table>";
            }
      })
  }
});
}

function actualizar_integrantes(result,cedula_param){

  var enfermedades = document.getElementById('integrantes_agregados'); 
  if(result!=0){
    enfermedades.innerHTML = "";
    for (var i = 0; i < result.length; i++) {
      enfermedades.innerHTML += " <table style='width:95%'><tr><td>- " + result[i]["cedula_persona"] + "</td><td style='text-align:right'><span onclick='borrar_familia("+result[i]['id_familia_persona']+","+result[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar' style='font-size:22px'></span></td></tr></table><br><hr>";
  }
}

}
var descri_imput1=document.getElementById("desc_antecedentes_personales");
var integrantes_input2=document.getElementById("desc_antecedentes_familiar");
var integrantes_input3=document.getElementById("desc_habitos_psicol");
var integrantes=[];
var valid_ante_person=document.getElementById("valid_ante_pers");
var valid_ante_familiar=document.getElementById("valid_ante_famy");
var valid_habit_psicolog=document.getElementById("valid_habit_psicolog");
var div_integrantes=document.getElementById("integrantes_agregados");

</script>
