【本笔记是基于Python3的】
【廖雪峰大神的教程：http://www.liaoxuefeng.com/wiki/0014316089557264a6b348958f449949df42a6d3a2e542c000/001431608990315a01b575e2ab041168ff0df194698afac000】

### Python的缺点：###
 1. Python是解释型语言，你的代码在执行时会一行一行地翻译成CPU能理解的机器码，这个翻译过程非常耗时，所以很**```慢```**。
 2. 第二个缺点就是代码**```不能加密```**。

Python是跨平台的，它可以运行在Windows、Mac和各种Linux/Unix系统上。在Windows上写Python程序，放到Linux上也是能够运行的。

目前，Python有两个版本，一个是2.x版，一个是3.x版，这两个版本是不兼容的。
python文件以**```.py```**结尾。
以**```#```**开头的语句是注释。
Python程序**```大小写敏感```**。
### 直接运行Python文件：###
在Windows系统上是不可以直接运行.py文件的，但是在Mac和Linux上是可以的，方法是在.py文件的第一行加上一个特殊的注释：
	
	#!/usr/bin/env python3
然后，给 .py 文件加权限（比如:first.py）
	
	chmod a+x first.py
然后直接在终端输入：
	
	./first.py


### Python文件头注解###
由于Python源代码也是一个文本文件，所以，当你的源代码中包含中文的时候，在保存源代码时，就需要务必指定保存为UTF-8编码。当Python解释器读取源代码时，为了让它按UTF-8编码读取，我们通常在文件开头写上这两行：
	
	#!/usr/bin/env python3
	# -*- coding: utf-8 -*-
第一行注释是为了告诉Linux/OS X系统，这是一个Python可执行程序，Windows系统会忽略这个注释；
第二行注释是为了告诉Python解释器，按照UTF-8编码读取源代码，否则，你在源代码中写的中文输出可能会有乱码。

### 输入和输出：
输出：print(要输出的内容)
	
	例如：print('hello,world!')
**print()函数也可以接受多个字符串，用逗号“,”隔开，就可以连成一串输出,效果就是将 “，” 翻译成空格输出**
输入：
	
	>>> name = input()  : input（）函数接收输入，并赋值给name变量
		kangda      ：此处是我输入的内容
	>>> name            ：输入name变量，打印输入的值
		'kangda'
	>>> 
