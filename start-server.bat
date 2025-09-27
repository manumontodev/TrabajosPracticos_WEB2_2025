@echo off 
title Entorno de Desarrollo PHP (Apache + LiveReload) 
echo 
============================================ 
echo Iniciando Apache y LiveReload para PHP 
echo (Cuando cierres esta ventana, se detendrán ambos) 
echo 
============================================ 
:: RUTA a XAMPP (ajustala si está en otro lugar) 
set XAMPP_PATH=C:\xampp 

:: Arrancar Apache en segundo plano 
echo Iniciando Apache... 
start "" /B "%XAMPP_PATH%\apache\bin\httpd.exe" 

:: Ir a la carpeta del proyecto 
cd /d %~dp0 

:: Arrancar LiveReload en segundo plano 
echo Iniciando LiveReload... 
:: start "" /B cmd /c "livereload . --extra-exts *" 
start "" /B cmd /c "livereload . --exts php,phtml,css,js,html"

echo 
============================================ 
echo Todo listo. Entrá a: http://localhost/tuproyecto 
echo Cuando cierres esta ventana, se detendrán Apache y LiveReload. 
echo 
============================================ 

:: Esperar a que cierres la consola 
:loop 
timeout /t 2 >nul 
goto loop 

:: Al cerrar la ventana, ejecutar limpieza 
:onExit 
taskkill /IM 
httpd.exe /F >nul 2>&1 
taskkill /IM node.exe /F >nul 2>&1 
exit