列表生成式: []
--
**通过列表生成式，我们可以直接创建一个列表。**
	
	# 举个例子
	
	# x * x 是对遍历结果的操作,后面跟着遍历,判断条件.
	# 那么这个式子的意思就是:生成1...10的x*x的序列.
	# 主要还是前面,x*x这块,这块是对数据的操作.
	>>> [x * x for x in range(1, 11) if x % 2 == 0]
	[4, 16, 36, 64, 100]

生成器: ()
--
**通过列表生成式，我们可以直接创建一个列表。但是，受到内存限制，列表容量肯定是有限的**。
而且如果创建一个很大的列表,而我们只需要频繁的使用列表前面的数据,这样使用列表生成式就造成了内存的浪费.所以，如果列表元素可以按照某种算法推算出来，那我们是否可以在循环的过程中不断推算出后续的元素呢？这样就不必创建完整的list，从而节省大量的空间。**在Python中，这种一边循环一边计算的机制，称为生成器：generator。**

**列表生成式和生成器在书写上的区别就是:一个是 []  一个是 () **
生成器:
	
	>>> g = (x *x for x in range(11))
	>>> g
	<generator object <genexpr> at 0x7fb3689f3468>
可以通过**next()函数**获得generator的下一个返回值:
			
	>>> next(g)
	0
	>>> next(g)
	1
	>>> next(g)
	4
	>>> next(g)
	9
	......
	>>> next(g)
	100
	>>> next(g)
	Traceback (most recent call last):
	  File "<stdin>", line 1, in <module>
	StopIteration

**generator保存的是算法，每次调用next(g)，就计算出g的下一个元素的值，直到计算到最后一个元素，没有更多的元素时，抛出StopIteration的错误。**
**generator也是可迭代对象,所以使用for循环来迭代**

	# 举个例子,斐波拉契数列函数
	
	def fib(max):
    n, a, b = 0, 0, 1
    while n < max:
        print(b)
        a, b = b, a + b  # a = b b = a + b
        n = n + 1
    return 'done'
斐波拉切函数和generator很像,从第一个元素可以推出后续的元素,因此我们把 **print(b) 改为 yield b**,就变成了generator.
	
	def fib(max):
    n, a, b = 0, 0, 1
    while n < max:
        yield b
        a, b = b, a + b
        n = n + 1
    return 'done'
    
这就是定义generator的另一种方法。**如果一个函数定义中包含yield关键字，那么这个函数就不再是一个普通函数，而是一个generator：**

	>>> f = fib(6)
	>>> f
	<generator object fib at 0x104feaaa0>

**generator和函数的执行流程不一样。函数是顺序执行，遇到return语句或者最后一行函数语句就返回。而变成generator的函数，在每次调用next()的时候执行，遇到yield语句返回，再次执行时从上次返回的yield语句处继续执行。**

	def odd():
	    print('step 1')
	    yield 1
	    print('step 2')
	    yield(3)
	    print('step 3')
	    yield(5)

**调用该generator时，首先要生成一个generator对象，然后用next()函数不断获得下一个返回值：**
	
	>>> o = odd()
	>>> next(o)
	step 1
	1
	>>> next(o)
	step 2
	3
	>>> next(o)
	step 3
	5
	>>> next(o)
	Traceback (most recent call last):
	  File "<stdin>", line 1, in <module>
	StopIteration



