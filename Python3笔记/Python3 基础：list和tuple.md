一.list  []
==
Python内置的一种数据类型是列表：list。**```list是一种有序的集合```**，可以随时添加和删除其中的元素。
	
	>>> classmates = ['kd','xiuxiu']
	>>> classmates
	['kd', 'xiuxiu']
	>>> 
1.访问list
--
和访问数组是一样的,使用下标.	要确保索引不要越界，记得最后一个元素的索引是**```len(classmates) - 1。```**

如果要取最后一个元素，除了计算索引位置外，还可以用-1做索引，直接获取最后一个元素：

	>>> classmates[-1]
	'xiuxiu'
2.添加内容
--
append(content): 向list末尾添加元素
insert(i,content): 将内容插入指定位置
pop(): 删除list末尾的元素
pop(i): 删除指定位置的元素
替换元素: 
	
	>>> classmates[1] = 'Jack'
二.tuple   ()
==
另一种有序列表叫元组：tuple。tuple和list非常类似，但是**```tuple一旦初始化就不能修改.```**
**不能被修改指的是tuple中的内容不能被修改,如果tuple中保存的是一个引用,引用没有被修改,引用所指向的内容被修改,也是可以的**
	
	>>> classmates = ('Michael', 'Bob', 'Tracy')

用下标获取元素.
如果要定义一个空的tuple，可以写成()：

	>>> t = ()
	>>> t
	()
但是，要定义一个只有1个元素的tuple，如果你这么定义：

	>>> t = (1)
	>>> t
	1
定义的不是tuple，是1这个数！这是因为括号()既可以表示tuple，又可以表示数学公式中的小括号，这就产生了歧义，因此，Python规定，这种情况下，按小括号进行计算，计算结果自然是1。
所以，只有1个元素的tuple定义时必须加一个逗号,，来消除歧义：

	>>> t = (1,)
	>>> t
	(1,)



【廖雪峰大神的教程：http://www.liaoxuefeng.com/wiki/0014316089557264a6b348958f449949df42a6d3a2e542c000/001431608990315a01b575e2ab041168ff0df194698afac000】


