from django.shortcuts import render
import requests
import sys
from subprocess import run,PIPE
def external(request):
    out=run(sys.executable,['C:\\xampp\\htdocs\\db\\qrPup.py'],shell=False,stdout=PIPE)
    print(out)
    return render(request,'exsis.html',{'data1':out.stdout})