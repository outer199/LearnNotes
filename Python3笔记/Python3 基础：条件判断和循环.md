一.条件判断
==
条件判断指的就是   **```if```**

	请仔细看if else的用法:
	if <条件判断1>:
	    <执行1>
	elif <条件判断2>:
	    <执行2>
	elif <条件判断3>:
	    <执行3>
	else:
	    <执行4>

	// 例子
	age = 3
	if age >= 18:
	    print('adult')
	elif age >= 6:
	    print('teenager')
	else:
	    print('kid')
if判断条件还可以简写，比如写：
	
	if x:
	    print('True')
**```只要x是非零数值、非空字符串、非空list等，就判断为True，否则为False。```**

**```Python提供了int()函数来将数字型字符串转为整数.```**

二.循环
==
Python的循环有两种
第一种是for...in循环:
--
	
	>>> for x in range(5):
	...     print(x)
	... 
range(5)的意思是:生成[0, 1, 2, 3, 4] 序列.
所以**for x in ...**循环就是把每个元素代入变量x，然后执行缩进块的语句。
第二种循环是while循环:
--
	
	sum = 0
	n = 99
	while n > 0:
	    sum = sum + n
	    n = n - 2
	print(sum)


【廖雪峰大神的教程：http://www.liaoxuefeng.com/wiki/0014316089557264a6b348958f449949df42a6d3a2e542c000/001431608990315a01b575e2ab041168ff0df194698afac000】




