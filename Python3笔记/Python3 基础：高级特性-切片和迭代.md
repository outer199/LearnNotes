切片
==
	# 定义一个list
	L = ['Michael', 'Sarah', 'Tracy', 'Bob', 'Jack']
	
	# 对L进行切片
	>>> L[0:3]  # 取索引:0 1 2的内容 ,或者简写:L[:3]
	['Michael', 'Sarah', 'Tracy']
	
	# 倒数切片  
	>>> L[-2:]
	['Bob', 'Jack']  # 记住倒数第一个元素的索引是-1
	>>> L[-2:-1]
	['Bob']  # 注意结果取的是-2位置的内容
	
	## 再来一个例子
	>>> L =list(range(100)) # 定义一个0...99的list
	>>> L[:10] # 取前10个
	[0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
	
	>>> L[:10:2] # 取前10个,每两个取一个
	[0, 2, 4, 6, 8]
	
	>>> L[::5] # 0...99,每五个取一个
	[0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95]
	
	>>> L[:]  # 这个相当于复制了一个list
	[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99]
	>>> 
**tuple也是一种list，唯一区别是tuple不可变。因此，tuple也可以用切片操作，只是操作的结果仍是tuple.**

字符串'xxx'也可以看成是一种list，每个元素就是一个字符。因此，字符串也可以用切片操作，只是操作结果仍是字符串：

	>>> 'ABCDEFG'[:3]
	'ABC'
	>>> 'ABCDEFG'[::2]
	'ACEG'

迭代
==
如果给定一个list或tuple，我们可以通过**for循环**来遍历这个list或tuple，这种遍历我们称为迭代（Iteration）。

**dict的迭代,默认情况下，dict迭代的是key。如果要迭代value，可以用for value in d.values()，如果要同时迭代key和value，可以用for k, v in d.items()。**
	
	# 默认迭代key
	>>> k = {'a':1,'b':2,'c':3}
	>>> for key in k:
	...     print(key)
	
	# 遍历value
	>>> for value in k.values():
	...     print(value)
	... 
	
	# 遍历key和value
	>>> for k,v in k.items():
	...     print(k,v)
	...
由于**字符串也是可迭代对象**，因此，也可以作用于for循环：

	>>> for ch in 'ABC':
	...     print(ch)
	...
当我们使用for循环时，只要作用于一个可迭代对象，for循环就可以正常运行,那么如何判断是可迭代对象呢?
**方法是通过collections模块的Iterable类型判断：**

	>>> from collections import Iterable
	>>> isinstance('abc', Iterable) # str是否可迭代
	True
	>>> isinstance([1,2,3], Iterable) # list是否可迭代
	True
	>>> isinstance(123, Iterable) # 整数是否可迭代
	False
Python内置的**```enumerate函数```**可以把一个list变成索引-元素对，这样就可以在for循环中同时迭代索引和元素本身：
	
	>>> for i, value in enumerate(['A', 'B', 'C']):
	...     print(i, value)
	...
	0 A
	1 B
	2 C



	
	
