【本笔记是基于Python3的】
【廖雪峰大神的教程：http://www.liaoxuefeng.com/wiki/0014316089557264a6b348958f449949df42a6d3a2e542c000/001431608990315a01b575e2ab041168ff0df194698afac000】


了解：
==
8个比特（bit）作为一个字节（byte）。
由于计算机是美国人发明的，因此，最早只有127个字母被编码到计算机里，也就是大小写英文字母、数字和一些符号，这个编码表被称为ASCII编码。但是要处理中文显然一个字节是不够的，至少需要两个字节，而且还不能和ASCII编码冲突，所以，中国制定了GB2312编码，用来把中文编进去。

Unicode把所有语言都统一到一套编码里，这样就不会再有乱码问题了。

ASCII编码和Unicode编码的区别：ASCII编码是1个字节，而Unicode编码通常是2个字节。

新的问题又出现了：如果统一成Unicode编码，乱码问题从此消失了。但是，如果你写的文本基本上全部是英文的话，用Unicode编码比ASCII编码需要多一倍的存储空间，在存储和传输上就十分不划算。
所以，本着节约的精神，又出现了把Unicode编码转化为**“可变长编码”的UTF-8编码**。UTF-8编码把一个Unicode字符根据不同的数字大小编码成1-6个字节，常用的英文字母被编码成1个字节，汉字通常是3个字节，只有很生僻的字符才会被编码成4-6个字节。如果你要传输的文本包含大量英文字符，用UTF-8编码就能节省空间。

![编码](http://img.blog.csdn.net/20161223172830379?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvdTAxNDExNTY3Mw==/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/SouthEast)

**ASCII编码实际上可以被看成是UTF-8编码的一部分**，所以，大量只支持ASCII编码的历史遗留软件可以在UTF-8编码下继续工作。

Python的字符串
==
最新的Python 3版本中，字符串是以**Unicode**编码的。
Python提供了**```ord()```**函数获取字符的整数表示，**```chr()```**函数把编码转换为对应的字符:

	>>> ord('A')
	65
	>>> 

	>>> chr(99)
	'c'
	>>>
 如果知道字符的整数编码，还可以用十六进制这么写str：

	>>> '\u4e2d\u6587'
	'中文'
	>>>
**可以使用python来进行unicode编码和转中文的任务。**

由于Python的字符串类型是str，在内存中以Unicode表示，一个字符对应若干个字节。如果要在网络上传输，或者保存到磁盘上，就需要**把str变为以字节为单位的bytes**。

Python对bytes类型的数据用**带b前缀的单引号或双引号**表示：

	x = b'ABC'
要注意区分'ABC'和b'ABC'，前者是str，后者虽然内容显示得和前者一样，但**bytes的每个字符都只占用一个字节。**

str转bytes
--
以Unicode表示的str通过**```encode()```**方法可以编码为指定的bytes：
	
	>>> 'abd'.encode('ascii')  # 将abd按ASCII编码编码为bytes
	b'abd'
	>>>
	>>> '中文'.encode('ascii')
	Traceback (most recent call last):
	  File "<stdin>", line 1, in <module>
	UnicodeEncodeError: 'ascii' codec can't encode characters in position 0-1: ordinal not in range(128)
	>>> 
	# 中文编码的范围超过了ASCII编码的范围，报错了。
**```在bytes中，无法显示为ASCII字符的字节，用  \x##  显示。```**
bytes 转 str
--
**使用decode(编码类型)方法**
	
	>>> b'abc'.decode('utf-8')
	'abc'
	>>> 
用**```len()```**函数计算长度：

	>>> len(b'abd')
	3
	>>>
	
	>>> len("中文".encode('utf-8'))
	6
	>>> 
	# 可见，1个中文字符经过UTF-8编码后通常会占用3个字节，而1个英文字符只占用1个字节。
格式化
==
在Python中，采用的格式化方式和C语言是一致的，用**```%```**实现，举例如下：
	
	>>> 'James %d' % 22
	'James 22'
	>>> 'James %d, %s' % (22,'男')
	'James 22, 男'
	>>>
	# %运算符就是用来格式化字符串的。在字符串内部，%s表示用字符串替换，%d表示用整数替换
有些时候，字符串里面的%是一个普通字符怎么办？这个时候就需要转义，用**```%%```**来表示一个%：
	
	>>> 'growth rete: %d %%' % 99
	'growth rete: 99 %'
	>>> 
	
