from django.conf.urls import url
from django.contrib import admin
from django.urls.resolvers import URLPattern
from . import views
URLPattern =[url(r'^external',views.external)]