@echo on
for /f "tokens=1 delims=*" %%i in (D:\Live-History\20190220\live.txt) do xcopy '%%i' 'D:\Live-History\20190220\%%~pi'
pause