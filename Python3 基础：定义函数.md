在Python中，定义一个函数要使用**```def```**语句，**```依次写出函数名、括号、括号中的参数和冒号:```**，然后，在缩进块中编写函数体，**```函数的返回值用return语句返回```**。

如果没有return语句，函数执行完毕后也会返回结果，只是结果为None。
return None可以简写为return。
1.空函数
--
如果想定义一个什么事也不做的空函数，可以用**```pass语句```**：

	def nop():
	    pass
pass语句什么都不做，那有什么用？实际上pass可以用来作为占位符，比如现在还没想好怎么写函数的代码，就可以先放一个pass，让代码能运行起来。

pass还可以用在其他语句里，比如：

if age >= 18:
    pass
**缺少了pass，代码运行就会有语法错误。**

2.参数检查
--
	
	def my_abs(x):
    if not isinstance(x, (int, float)):
        raise TypeError('bad operand type')
    if x >= 0:
        return x
    else:
        return -x
3.返回多个值
--

	import math

	def move(x, y, step, angle=0):
	    nx = x + step * math.cos(angle)
	    ny = y - step * math.sin(angle)
	    return nx, ny
	    
	>>> x, y = move(100, 100, 60, math.pi / 6)
	>>> 151.96152422706632 70.0
其实,Python函数返回的仍然是单一值：
	
	>>> r = move(100, 100, 60, math.pi / 6)
	>>> print(r)
	(151.96152422706632, 70.0)
**原来返回值是一个tuple！但是，在语法上，返回一个tuple可以省略括号，而多个变量可以同时接收一个tuple，按位置赋给对应的值，所以，Python的函数返回多值其实就是返回一个tuple.**

4.函数的参数
--

 1. 位置参数:就是定义函数的参数
 2. 默认参数:在定义时给参数赋一个默认值
	 
		 # 计算x的n次方
		 def power(x, n=2):
		    s = 1
		    while n > 0:
		        n = n - 1
		        s = s * x
		    return s
		 
	**```定义默认参数要牢记一点：默认参数必须指向不变对象！[默认参数的坑,请看文章末尾]```**
 3. 可变参数:    *numbers,  可变参数允许你传入0个或任意个参数
 
		def calc(*numbers):
		    sum = 0
		    for n in numbers:
		        sum = sum + n * n
		    return sum
			
		# 传入已经存在的list,使用    *list变量名称
		>>> nums = [1, 2, 3]
		>>> calc(*nums)
		14
在函数内部，参数numbers接收到的是一个tuple.
 4. 关键字参数: 
**可变参数允许你传入0个或任意个参数，这些可变参数在函数调用时自动组装为一个tuple。而关键字参数允许你传入0个或任意个含参数名的参数，这些关键字参数在函数内部自动组装为一个dict。**
	
		def person(name, age, **kw):
		    print('name:', name, 'age:', age, 'other:', kw)
		    
		# 调用person函数
		>>> person('Bob', 35, city='Beijing')
		name: Bob age: 35 other: {'city': 'Beijing'}
		>>> person('Adam', 45, gender='M', job='Engineer')
		name: Adam age: 45 other: {'gender': 'M', 'job': 'Engineer'}
		
		# 现成的dict使用   **dict名称  
		>>> extra = {'city': 'Beijing', 'job': 'Engineer'}
		>>> person('Jack', 24, **extra)
		name: Jack age: 24 other: {'city': 'Beijing', 'job': 'Engineer'}
		
		**extra表示把extra这个dict的所有key-value用关键字参数传入到函数的**kw参数，kw将获得一个dict，注意kw获得的dict是extra的一份拷贝，对kw的改动不会影响到函数外的extra。
 5. 命名关键字参数:

	如果要**限制关键字参数的名字**，就可以用命名关键字参数，例如，只接收city和job作为关键字参数。这种方式定义的函数如下：

		def person(name, age, *, city, job):
		    print(name, age, city, job)
	**命名关键字参数需要一个特殊分隔符\*，\*后面的参数被视为命名关键字参数。**
调用方式如下：

		>>> person('Jack', 24, city='Beijing', job='Engineer')
		Jack 24 Beijing Engineer
**如果函数定义中已经有了一个可变参数，后面跟着的命名关键字参数就不再需要一个特殊分隔符*了：**

		def person(name, age, *args, city, job):
		    print(name, age, args, city, job)
**命名关键字参数必须传入参数名，这和位置参数不同。如果没有传入参数名，调用将报错.**
**命名关键字参数可以有缺省值，从而简化调用**：

		def person(name, age, *, city='Beijing', job):
		    print(name, age, city, job)
		    
		# 由于命名关键字参数city具有默认值，调用时，可不传入city参数：
		>>> person('Jack', 24, job='Engineer')
		Jack 24 Beijing Engineer

 6. 参数组合:
 在Python中定义函数，可以用必选参数、默认参数、可变参数、关键字参数和命名关键字参数，这5种参数都可以组合使用。但是请注意，**参数定义的顺序必须是：必选参数、默认参数、可变参数、命名关键字参数和关键字参数。**

默认参数的坑
--
先定义一个函数，传入一个list，添加一个END再返回：

	def add_end(L=[]):
	    L.append('END')
	    return L
这个函数正常调用是没有问题的,但是如果你这样:
	
	>>> add_end()
	['END', 'END']
	>>> add_end()
	['END', 'END', 'END']
为什么会这样呢?
**Python函数在定义的时候，默认参数L的值就被计算出来了，即[]，因为默认参数L也是一个变量，它指向对象[]，每次调用该函数，如果改变了L的内容，则下次调用时，默认参数的内容就变了，不再是函数定义时的[]了。**

**所以，定义默认参数要牢记一点：默认参数必须指向不变对象！**


【廖雪峰大神的教程：http://www.liaoxuefeng.com/wiki/0014316089557264a6b348958f449949df42a6d3a2e542c000/001431608990315a01b575e2ab041168ff0df194698afac000】
