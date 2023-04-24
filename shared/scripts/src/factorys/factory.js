import Controllers from './../controllers/controllers.js'
import Views from './../views/views.js'
import Services from './../services/services.js'

const factory = {
    initializer: async () => {
        Controllers.initializer({
            views: new Views(),
            services: new Services()
        })
    }
}

export default factory