export default function (context: any) {
  if (
    context.app.$cookies.get('is_authenticated') === null ||
    context.app.$cookies.get('auth_token') === null ||
    context.app.$cookies.get('user_data') === null
  ) {
    context.redirect('/admin/login')
  } else {
    const user = context.app.$cookies.get('user_data')
    // const userParse = JSON.parse(user || '{}')
    if (!user || user.is_super_admin !== 1) {
      context.app.$cookies.remove('auth_token')
      context.app.$cookies.remove('is_authenticated')
      context.app.$cookies.remove('user_data')

      context.redirect('/admin/login')
    }
  }
}
